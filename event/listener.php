<?php
/**
 *
 * Google Analytics extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\googleanalytics\event;

use phpbb\config\config;
use phpbb\language\language;
use phpbb\template\template;
use phpbb\user;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var config */
	protected $config;

	/** @var language */
	protected $language;

	/** @var template */
	protected $template;

	/** @var user */
	protected $user;

	/**
	 * Constructor
	 *
	 * @param config   $config   Config object
	 * @param language $language Language object
	 * @param template $template Template object
	 * @param user     $user     User object
	 * @access public
	 */
	public function __construct(config $config, language $language, template $template, user $user)
	{
		$this->config = $config;
		$this->language = $language;
		$this->template = $template;
		$this->user = $user;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	public static function getSubscribedEvents()
	{
		return [
			'core.page_header'				=> 'load_google_analytics',
			'core.acp_board_config_edit_add'	=> 'add_googleanalytics_configs',
			'core.validate_config_variable'	=> 'validate_googleanalytics_id',
			'core.page_footer_after'		=> 'append_agreement',
		];
	}

	/**
	 * Load Google Analytics js code
	 *
	 * @return void
	 * @access public
	 */
	public function load_google_analytics()
	{
		$this->template->assign_vars([
			'GOOGLEANALYTICS_ID'		=> $this->config['googleanalytics_id'],
			'GOOGLEANALYTICS_TAG'		=> $this->config['googleanalytics_tag'],
			'GOOGLEANALYTICS_USER_ID'	=> $this->user->data['user_id'],
			'S_ANONYMIZE_IP'			=> $this->config['ga_anonymize_ip'],
		]);
	}

	/**
	 * Add config vars to ACP Board Settings
	 *
	 * @param \phpbb\event\data $event The event object
	 * @return void
	 * @access public
	 */
	public function add_googleanalytics_configs($event)
	{
		// Add a config to the settings mode, after warnings_expire_days
		if ($event['mode'] === 'settings' && isset($event['display_vars']['vars']['warnings_expire_days']))
		{
			// Load language file
			$this->language->add_lang('googleanalytics_acp', 'phpbb/googleanalytics');

			// Store display_vars event in a local variable
			$display_vars = $event['display_vars'];

			// Define the new config vars
			$ga_config_vars = [
				'legend_googleanalytics' => 'ACP_GOOGLEANALYTICS',
				'googleanalytics_id' => [
					'lang'		=> 'ACP_GOOGLEANALYTICS_ID',
					'validate'	=> 'googleanalytics_id',
					'type'		=> 'text:40:20',
					'explain'	=> true,
				],
				'ga_anonymize_ip' => [
					'lang'		=> 'ACP_GA_ANONYMIZE_IP',
					'validate'	=> 'bool',
					'type'		=> 'radio:yes_no',
					'explain'	=> true,
				],
				'googleanalytics_tag' => [
					'lang'		=> 'ACP_GOOGLEANALYTICS_TAG',
					'validate'	=> 'int',
					'type'		=> 'select',
					'function'	=> 'build_select',
					'params'	=> [[
						0	=> 'ACP_GA_ANALYTICS_TAG',
						1	=> 'ACP_GA_GTAGS_TAG',
					], '{CONFIG_VALUE}'],
					'explain'	=> true,
				],
			];

			// Add the new config vars after warnings_expire_days in the display_vars config array
			$insert_after = ['after' => 'warnings_expire_days'];
			$display_vars['vars'] = phpbb_insert_config_array($display_vars['vars'], $ga_config_vars, $insert_after);

			// Update the display_vars event with the new array
			$event['display_vars'] = $display_vars;
		}
	}

	/**
	 * Validate the Google Analytics ID
	 *
	 * @param \phpbb\event\data $event The event object
	 * @return void
	 * @access public
	 */
	public function validate_googleanalytics_id($event)
	{
		// Check if the validate test is for google_analytics
		if ($event['config_definition']['validate'] !== 'googleanalytics_id' || empty($event['cfg_array']['googleanalytics_id']))
		{
			return;
		}

		// Store the input and error event data
		$input = $event['cfg_array']['googleanalytics_id'];
		$error = $event['error'];

		// Add error message if the input is not a valid Google Analytics ID
		if (!preg_match('/^UA-\d{4,9}-\d{1,4}$|^G-[A-Z0-9]{10}$/', $input))
		{
			$error[] = $this->language->lang('ACP_GOOGLEANALYTICS_ID_INVALID', $input);
		}

		// Add error message if GTAG is not selected for use with a Measurement ID
		if ((int) $event['cfg_array']['googleanalytics_tag'] === 0 && preg_match('/^G-[A-Z0-9]{10}$/', $input))
		{
			$error[] = $this->language->lang('ACP_GOOGLEANALYTICS_TAG_INVALID', $input);
		}

		// Update error event data
		$event['error'] = $error;
	}

	/**
	 * Append additional agreement details to the privacy agreement.
	 *
	 * @return void
	 */
	public function append_agreement()
	{
		if (!$this->config['googleanalytics_id']
			|| (strpos($this->user->page['page_name'], 'ucp') !== 0)
			|| !$this->template->retrieve_var('S_AGREEMENT')
			|| ($this->template->retrieve_var('AGREEMENT_TITLE') !== $this->language->lang('PRIVACY')))
		{
			return;
		}

		$this->language->add_lang('googleanalytics_ucp', 'phpbb/googleanalytics');

		$this->template->append_var('AGREEMENT_TEXT', $this->language->lang('PHPBB_ANALYTICS_PRIVACY_POLICY', $this->config['sitename']));
	}
}
