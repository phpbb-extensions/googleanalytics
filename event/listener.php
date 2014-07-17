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
	* @return \phpbb\boardrules\event\listener
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
			'core.page_header'					=> 'load_google_analytics',
			'core.acp_board_config_edit_add'	=> 'add_googleanalytics_configs',
			'core.validate_config_variable'		=> 'validate_googleanalytics_id',
		);
	}

	/**
	* Load Google Analytics js code
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function load_google_analytics($event)
	{
		$this->template->assign_var('GOOGLEANALYTICS_ID', $this->config['googleanalytics_id']);
	}

	/**
	* Add config vars to ACP Board Settings
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function add_googleanalytics_configs($event)
	{
		// Add a config to the settings mode, after override_user_style
		if ($event['mode'] == 'settings' && isset($event['display_vars']['vars']['override_user_style']))
		{
			// Store display_vars event in a local variable
			$display_vars = $event['display_vars'];

			// Define the new config vars
			$ga_config_vars = array(
				'googleanalytics_id' => array(
					'lang' => 'ACP_GOOGLEANALYTICS_ID',
					'validate' => 'googleanayltics_id',
					'type' => 'text:40:20',
					'explain' => true,
				),
			);

			// Insert the config vars after override_user_style
			$insert_after = 'override_user_style';

			// Rebuild new config var array
			$position = array_search($insert_after, array_keys($display_vars['vars'])) + 1;
			$display_vars['vars'] = array_merge(
				array_slice($display_vars['vars'], 0, $position),
				$ga_config_vars,
				array_slice($display_vars['vars'], $position)
			);

			// Update the display_vars event with the new array
			$event['display_vars'] = $display_vars;
		}
	}


	/**
	* Validate the Google Analytics ID
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function validate_googleanalytics_id($event)
	{
		// Check if the validate test is for google_analytics
		if ($event['config_definition']['validate'] == 'googleanayltics_id')
		{
			// Store the error and input event data
			$error = $event['error'];
			$input = $event['cfg_array'][$event['config_name']];

			// Add error message if the input is not a valid Google Analytics ID
			if (!preg_match('/^ua-\d{4,9}-\d{1,4}$/i', strval($input)))
			{
				$error[] = $this->user->lang('ACP_GOOGLEANALYTICS_ID_INVALID', $input);
			}

			// Update error event data
			$event['error'] = $error;
		}
	}
}
