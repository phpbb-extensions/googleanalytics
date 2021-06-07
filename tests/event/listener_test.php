<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\googleanalytics\tests\event;

require_once __DIR__ . '/../../../../../includes/functions_acp.php';

class listener_test extends \phpbb_test_case
{
	/** @var \phpbb\googleanalytics\event\listener */
	protected $listener;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Setup test environment
	*/
	protected function setUp(): void
	{
		parent::setUp();

		global $phpbb_root_path, $phpEx;

		// Load/Mock classes required by the event listener class
		$this->config = new \phpbb\config\config(array(
			'googleanalytics_id' => 'UA-000000-01',
			'ga_anonymize_ip' => 0,
		));
		$this->template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();
		$lang_loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$lang = new \phpbb\language\language($lang_loader);
		$this->user = new \phpbb\user($lang, '\phpbb\datetime');
		$this->user->data['user_id'] = 2;
		$this->user->data['is_registered'] = true;
	}

	/**
	* Create our event listener
	*/
	protected function set_listener()
	{
		$this->listener = new \phpbb\googleanalytics\event\listener(
			$this->config,
			$this->template,
			$this->user
		);
	}

	/**
	* Test the event listener is constructed correctly
	*/
	public function test_construct()
	{
		$this->set_listener();
		self::assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->listener);
	}

	/**
	* Test the event listener is subscribing events
	*/
	public function test_getSubscribedEvents()
	{
		self::assertEquals(array(
			'core.acp_board_config_edit_add',
			'core.page_header',
			'core.validate_config_variable',
		), array_keys(\phpbb\googleanalytics\event\listener::getSubscribedEvents()));
	}

	/**
	* Test the load_google_analytics event
	*/
	public function test_load_google_analytics()
	{
		$this->set_listener();

		$this->template->expects(self::once())
			->method('assign_vars')
			->with(array(
				'GOOGLEANALYTICS_ID'		=> $this->config['googleanalytics_id'],
				'GOOGLEANALYTICS_TAG'		=> $this->config['googleanalytics_tag'],
				'GOOGLEANALYTICS_USER_ID'	=> $this->user->data['user_id'],
				'S_ANONYMIZE_IP'			=> $this->config['ga_anonymize_ip'],
			));

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header', array($this->listener, 'load_google_analytics'));
		$dispatcher->trigger_event('core.page_header');
	}

	/**
	* Data set for test_add_googleanalytics_configs
	*
	* @return array Array of test data
	*/
	public function add_googleanalytics_configs_data()
	{
		return array(
			array( // expected config and mode
				'settings',
				array('vars' => array('warnings_expire_days' => array())),
				array('warnings_expire_days', 'legend_googleanalytics', 'googleanalytics_id', 'ga_anonymize_ip', 'googleanalytics_tag'),
			),
			array( // unexpected mode
				'foobar',
				array('vars' => array('warnings_expire_days' => array())),
				array('warnings_expire_days'),
			),
			array( // unexpected config
				'settings',
				array('vars' => array('foobar' => array())),
				array('foobar'),
			),
			array( // unexpected config and mode
				'foobar',
				array('vars' => array('foobar' => array())),
				array('foobar'),
			),
		);
	}

	/**
	* Test the add_googleanalytics_configs event
	*
	* @dataProvider add_googleanalytics_configs_data
	*/
	public function test_add_googleanalytics_configs($mode, $display_vars, $expected_keys)
	{
		$this->set_listener();

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.acp_board_config_edit_add', array($this->listener, 'add_googleanalytics_configs'));

		$event_data = array('display_vars', 'mode');
		$event_data_after = $dispatcher->trigger_event('core.acp_board_config_edit_add', compact($event_data));
		extract($event_data_after, EXTR_OVERWRITE);

		$keys = array_keys($display_vars['vars']);

		self::assertEquals($expected_keys, $keys);
	}

	/**
	* Data set for test_validate_googleanalytics_id
	*
	* @return array Array of test data
	*/
	public function validate_googleanalytics_id_data()
	{
		return array(
			array(
				// valid code, no error
				array('googleanalytics_id' => 'UA-1234-56', 'googleanalytics_tag' => 0),
				array(),
			),
			array(
				// valid code, no error
				array('googleanalytics_id' => 'UA-1234-56', 'googleanalytics_tag' => 1),
				array(),
			),
			array(
				// valid code, no error
				array('googleanalytics_id' => 'G-A1B2C3D4E5', 'googleanalytics_tag' => 1),
				array(),
			),
			array(
				// no code, no error
				array('googleanalytics_id' => '', 'googleanalytics_tag' => 1),
				array(),
			),
			array(
				// no googleanalytics_id, no error
				array('foo' => 'bar'),
				array(),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'G-A1B2C3D4E5', 'googleanalytics_tag' => 0),
				array('ACP_GOOGLEANALYTICS_TAG_INVALID'),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'UA-12-34', 'googleanalytics_tag' => 1),
				array('ACP_GOOGLEANALYTICS_ID_INVALID'),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'UA-01234-56789', 'googleanalytics_tag' => 1),
				array('ACP_GOOGLEANALYTICS_ID_INVALID'),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'AU-1234-56', 'googleanalytics_tag' => 1),
				array('ACP_GOOGLEANALYTICS_ID_INVALID'),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'foo-bar-foo', 'googleanalytics_tag' => 1),
				array('ACP_GOOGLEANALYTICS_ID_INVALID'),
			),
		);
	}

	/**
	* Test the validate_googleanalytics_id event
	*
	* @dataProvider validate_googleanalytics_id_data
	*/
	public function test_validate_googleanalytics_id($cfg_array, $expected_error)
	{
		$this->set_listener();

		$config_name = key($cfg_array);
		$config_definition = array('validate' => 'googleanalytics_id');
		$error = array();

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.validate_config_variable', array($this->listener, 'validate_googleanalytics_id'));

		$event_data = array('cfg_array', 'config_name', 'config_definition', 'error');
		$event_data_after = $dispatcher->trigger_event('core.validate_config_variable', compact($event_data));

		foreach ($event_data as $expected)
		{
			self::assertArrayHasKey($expected, $event_data_after);
		}
		extract($event_data_after, EXTR_OVERWRITE);

		self::assertEquals($expected_error, $error);
	}
}
