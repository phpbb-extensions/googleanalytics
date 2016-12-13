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

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\template\template    $template           Template object
	* @param \phpbb\user                 $user               User object
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
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
	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_board_config_edit_add'	=> 'add_googleanalytics_configs',
			'core.page_header'					=> 'load_google_analytics',
			'core.validate_config_variable'		=> 'validate_googleanalytics_id',
		);
	}

	/**
	* Load Google Analytics js code
	*
	* @return void
	* @access public
	*/
	public function load_google_analytics()
	{
		$this->template->assign_vars(array(
			'GOOGLEANALYTICS_ID'		=> $this->config['googleanalytics_id'],
			'GOOGLEANALYTICS_USER_ID'	=> $this->user->data['user_id'],
		));
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
			$this->user->add_lang_ext('phpbb/googleanalytics', 'googleanalytics_acp');

			// Store display_vars event in a local variable
			$display_vars = $event['display_vars'];

			// Define the new config vars
			$ga_config_vars = array(
				'legend_googleanalytics' => 'ACP_GOOGLEANALYTICS',
				'googleanalytics_id' => array(
					'lang'		=> 'ACP_GOOGLEANALYTICS_ID',
					'validate'	=> 'googleanalytics_id',
					'type'		=> 'text:40:20',
					'explain'	=> true,
				),
			);

			// Add the new config vars after warnings_expire_days in the display_vars config array
			$insert_after = array('after' => 'warnings_expire_days');
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
		$input = $event['cfg_array']['googleanalytics_id'];

		// Check if the validate test is for google_analytics
		if ($input !== '' && $event['config_definition']['validate'] === 'googleanalytics_id')
		{
			// Store the error and input event data
			$error = $event['error'];

			// Add error message if the input is not a valid Google Analytics ID
			if (!preg_match('/^UA-\d{4,9}-\d{1,4}$/', $input))
			{
				$error[] = $this->user->lang('ACP_GOOGLEANALYTICS_ID_INVALID', $input);
			}

			// Update error event data
			$event['error'] = $error;
		}
	}
}
