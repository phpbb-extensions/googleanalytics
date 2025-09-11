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

class listener_test extends \phpbb_test_case
{
	/** @var \phpbb\googleanalytics\event\listener */
	protected $listener;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	public static function setUpBeforeClass(): void
	{
		$acp_functions = __DIR__ . '/../../../../../includes/functions_acp.php';
		if (is_file($acp_functions))
		{
			require_once $acp_functions;
		}
	}

	/**
	 * Setup test environment
	 */
	protected function setUp(): void
	{
		parent::setUp();

		global $phpbb_root_path, $phpEx;

		// Load/Mock classes required by the event listener class
		$this->config = new \phpbb\config\config([
			'googleanalytics_id' => 'UA-000000-01',
			'ga_anonymize_ip' => 0,
		]);
		$this->template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();
		$lang_loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$this->language = new \phpbb\language\language($lang_loader);
		$this->user = new \phpbb\user($this->language, '\phpbb\datetime');
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
			$this->language,
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
		self::assertEquals([
			'core.page_header',
			'core.acp_board_config_edit_add',
			'core.validate_config_variable',
			'core.page_footer_after',
		], array_keys(\phpbb\googleanalytics\event\listener::getSubscribedEvents()));
	}

	/**
	 * Test the load_google_analytics event
	 */
	public function test_load_google_analytics()
	{
		$this->set_listener();

		$this->template->expects(self::once())
			->method('assign_vars')
			->with([
				'GOOGLEANALYTICS_ID'		=> $this->config['googleanalytics_id'],
				'GOOGLEANALYTICS_TAG'		=> $this->config['googleanalytics_tag'],
				'GOOGLEANALYTICS_USER_ID'	=> $this->user->data['user_id'],
				'S_ANONYMIZE_IP'			=> $this->config['ga_anonymize_ip'],
			]);

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header', [$this->listener, 'load_google_analytics']);
		$dispatcher->trigger_event('core.page_header');
	}

	/**
	 * Data set for test_add_googleanalytics_configs
	 *
	 * @return array Array of test data
	 */
	public function add_googleanalytics_configs_data()
	{
		return [
			[ // expected config and mode
			  'settings',
			  ['vars' => ['warnings_expire_days' => []]],
			  ['warnings_expire_days', 'legend_googleanalytics', 'googleanalytics_id', 'ga_anonymize_ip', 'googleanalytics_tag'],
			],
			[ // unexpected mode
			  'foobar',
			  ['vars' => ['warnings_expire_days' => []]],
			  ['warnings_expire_days'],
			],
			[ // unexpected config
			  'settings',
			  ['vars' => ['foobar' => []]],
			  ['foobar'],
			],
			[ // unexpected config and mode
			  'foobar',
			  ['vars' => ['foobar' => []]],
			  ['foobar'],
			],
		];
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
		$dispatcher->addListener('core.acp_board_config_edit_add', [$this->listener, 'add_googleanalytics_configs']);

		$event_data = ['display_vars', 'mode'];
		$event_data_after = $dispatcher->trigger_event('core.acp_board_config_edit_add', compact($event_data));
		extract($event_data_after);

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
		return [
			[
				// valid code, no error
				['googleanalytics_id' => 'UA-1234-56', 'googleanalytics_tag' => 0],
				[],
			],
			[
				// valid code, no error
				['googleanalytics_id' => 'UA-1234-56', 'googleanalytics_tag' => 1],
				[],
			],
			[
				// valid code, no error
				['googleanalytics_id' => 'G-A1B2C3D4E5', 'googleanalytics_tag' => 1],
				[],
			],
			[
				// no code, no error
				['googleanalytics_id' => '', 'googleanalytics_tag' => 1],
				[],
			],
			[
				// no googleanalytics_id, no error
				['foo' => 'bar'],
				[],
			],
			[
				// invalid code, error
				['googleanalytics_id' => 'G-A1B2C3D4E5', 'googleanalytics_tag' => 0],
				['ACP_GOOGLEANALYTICS_TAG_INVALID'],
			],
			[
				// invalid code, error
				['googleanalytics_id' => 'UA-12-34', 'googleanalytics_tag' => 1],
				['ACP_GOOGLEANALYTICS_ID_INVALID'],
			],
			[
				// invalid code, error
				['googleanalytics_id' => 'UA-01234-56789', 'googleanalytics_tag' => 1],
				['ACP_GOOGLEANALYTICS_ID_INVALID'],
			],
			[
				// invalid code, error
				['googleanalytics_id' => 'AU-1234-56', 'googleanalytics_tag' => 1],
				['ACP_GOOGLEANALYTICS_ID_INVALID'],
			],
			[
				// invalid code, error
				['googleanalytics_id' => 'foo-bar-foo', 'googleanalytics_tag' => 1],
				['ACP_GOOGLEANALYTICS_ID_INVALID'],
			],
		];
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
		$config_definition = ['validate' => 'googleanalytics_id'];
		$error = [];

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.validate_config_variable', [$this->listener, 'validate_googleanalytics_id']);

		$event_data = ['cfg_array', 'config_name', 'config_definition', 'error'];
		$event_data_after = $dispatcher->trigger_event('core.validate_config_variable', compact($event_data));

		foreach ($event_data as $expected)
		{
			self::assertArrayHasKey($expected, $event_data_after);
		}
		extract($event_data_after);

		self::assertEquals($expected_error, $error);
	}

	/**
	 * Data for test_append_agreement
	 *
	 * @return array
	 */
	public function append_agreement_data()
	{
		return [
			[false, 'PRIVACY', 0], // No agreement
			[true, 'TERMS', 0], // Wrong title
			[true, 'PRIVACY', 1], // Correct conditions
		];
	}

	/**
	 * Test the append_agreement method
	 *
	 * @dataProvider append_agreement_data
	 * @param mixed $s_agreement S_AGREEMENT template variable value
	 * @param mixed $agreement_title AGREEMENT_TITLE template variable value
	 * @param int $expected_append_calls Expected append_var calls
	 */
	public function test_append_agreement($s_agreement, $agreement_title, $expected_append_calls)
	{
		$this->config['sitename'] = 'Test Forum';
		$this->user->page['page_name'] = 'ucp.php';

		$this->template->expects(self::atMost(2))
			->method('retrieve_var')
			->withConsecutive(['S_AGREEMENT'], ['AGREEMENT_TITLE'])
			->willReturnOnConsecutiveCalls($s_agreement, $this->language->lang($agreement_title));

		if ($expected_append_calls > 0)
		{
			$this->template->expects(self::once())
				->method('append_var')
				->with('AGREEMENT_TEXT', $this->language->lang('PHPBB_ANALYTICS_PRIVACY_POLICY', 'Test Forum'));
		}
		else
		{
			$this->template->expects(self::never())
				->method('append_var');
		}

		$this->set_listener();
		$this->listener->append_agreement();
	}
}
