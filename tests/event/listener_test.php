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

require_once dirname(__FILE__) . '/../../../../../includes/functions_acp.php';

class event_listener_test extends \phpbb_test_case
{
	/** @var \phpbb\googleanalytics\event\listener */
	protected $listener;

	/**
	* Setup test environment
	*
	* @access public
	*/
	public function setUp()
	{
		parent::setUp();

		global $phpbb_dispatcher, $phpbb_extension_manager, $phpbb_root_path;

		// Mock some global classes that may be called during code execution
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();
		$phpbb_extension_manager = new \phpbb_mock_extension_manager($phpbb_root_path);

		// Load/Mock classes required by the event listener class
		$this->config = new \phpbb\config\config(array('googleanalytics_id' => 'UA-000000-01'));
		$this->template = new \phpbb\googleanalytics\tests\mock\template();
		$this->user = new \phpbb\user('\phpbb\datetime');
	}

	/**
	* Create our event listener
	*
	* @access protected
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
	*
	* @access public
	*/
	public function test_construct()
	{
		$this->set_listener();
		$this->assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->listener);
	}

	/**
	* Test the event listener is subscribing events
	*
	* @access public
	*/
	public function test_getSubscribedEvents()
	{
		$this->assertEquals(array(
			'core.acp_board_config_edit_add',
			'core.page_header',
			'core.validate_config_variable',
		), array_keys(\phpbb\googleanalytics\event\listener::getSubscribedEvents()));
	}

	/**
	* Test the load_google_analytics event
	*
	* @access public
	*/
	public function test_load_google_analytics()
	{
		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.page_header', array($this->listener, 'load_google_analytics'));
		$dispatcher->dispatch('core.page_header');

		$this->assertEquals(array(
			'GOOGLEANALYTICS_ID'	=> $this->config['googleanalytics_id'],
		), $this->template->get_template_vars());
	}

	/**
	* Data set for test_add_googleanalytics_configs
	*
	* @return array Array of test data
	* @access public
	*/
	public function add_googleanalytics_configs_data()
	{
		return array(
			array( // expected config and mode
				'settings',
				array('vars' => array('board_timezone' => array())),
				array('board_timezone', 'googleanalytics_id'),
			),
			array( // unexpected mode
				'foobar',
				array('vars' => array('board_timezone' => array())),
				array('board_timezone'),
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
	* @access public
	*/
	public function test_add_googleanalytics_configs($mode, $display_vars, $expected_keys)
	{
		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.acp_board_config_edit_add', array($this->listener, 'add_googleanalytics_configs'));

		$event_data = array('display_vars', 'mode');
		$event = new \phpbb\event\data(compact($event_data));
		$dispatcher->dispatch('core.acp_board_config_edit_add', $event);

		$event_data_after = $event->get_data_filtered($event_data);
		foreach ($event_data as $expected)
		{
			$this->assertArrayHasKey($expected, $event_data_after);
		}
		extract($event_data_after);

		$keys = array_keys($display_vars['vars']);

		$this->assertEquals($expected_keys, $keys);
	}

	/**
	* Data set for test_validate_googleanalytics_id
	*
	* @return array Array of test data
	* @access public
	*/
	public function validate_googleanalytics_id_data()
	{
		return array(
			array(
				// valid code, no error
				array('googleanalytics_id' => 'UA-0000-00'),
				array(),
			),
			array(
				// no code, no error
				array('googleanalytics_id' => ''),
				array(),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'UA-00-00'),
				array('ACP_GOOGLEANALYTICS_ID_INVALID'),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'UA-00000-00000'),
				array('ACP_GOOGLEANALYTICS_ID_INVALID'),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'AU-0000-00'),
				array('ACP_GOOGLEANALYTICS_ID_INVALID'),
			),
			array(
				// invalid code, error
				array('googleanalytics_id' => 'foo-bar-foo'),
				array('ACP_GOOGLEANALYTICS_ID_INVALID'),
			),
		);
	}

	/**
	* Test the validate_googleanalytics_id event
	*
	* @dataProvider validate_googleanalytics_id_data
	* @access public
	*/
	public function test_validate_googleanalytics_id($cfg_array, $expected_error)
	{
		$this->set_listener();

		$config_name = 'googleanalytics_id';
		$config_definition = array('validate' => 'googleanalytics_id');
		$error = array();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.validate_config_variable', array($this->listener, 'validate_googleanalytics_id'));

		$event_data = array('cfg_array', 'config_name', 'config_definition', 'error');
		$event = new \phpbb\event\data(compact($event_data));
		$dispatcher->dispatch('core.validate_config_variable', $event);

		$event_data_after = $event->get_data_filtered($event_data);
		foreach ($event_data as $expected)
		{
			$this->assertArrayHasKey($expected, $event_data_after);
		}
		extract($event_data_after);

		$this->assertEquals($expected_error, $error);
	}
}
