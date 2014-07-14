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

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @return \phpbb\googleanalytics\event\listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config)
	{
		$this->config = $config;
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
			'core.user_setup'                 => 'load_language_on_setup',
			'core.permissions'                => 'add_permission',
			'core.acp_board_config_edit_add'  => 'add_googleanalytics_config',
		);
	}

	/**
	* Load common board rules language files during user setup
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'phpbb/googleanalytics',
			'lang_set' => 'googleanalytics_common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* Add config vars to ACP Board Settings
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function add_googleanalytics_config($event)
	{

		if ($event['mode'] == 'settings' && isset($event['display_vars']['vars']['override_user_style']))
		{
			// Store display_vars event in a local variable
			$display_vars = $event['display_vars'];

			// Define the new config vars
			$ga_display_vars = array(
				'googleanalytics' => array(
					'lang' => 'ACP_GOOGLEANALYTICS_ID',
					'validate' => 'googleanayltics_id',
					'type' => 'text:40:255',
					'explain' => true,
				)
			);

			// setup search
			$insert_after = 'warnings_expire_days';

			// find position starting
			$position = array_search($insert_after, array_keys($display_vars['vars']))- 1;

			// rebuild new config var array
			$display_vars['vars'] = array_merge(
				array_slice($display_vars['vars'], 0, $position),
					$ga_display_vars, array_slice($display_vars['vars'], $position)
			);

			// update the display_vars event with the new array
			$event['display_vars'] = array(
					'title' => $display_vars['title'],
					'vars' => $display_vars['vars'],
			);
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
				$error[] = $this->user->lang('GOOGLEANALYTICS_ID_INVALID', $input);
			}

			// Update error event data
			$event['error'] = $error;
		}
	}

	/**
	* Insert Google Analytics ID into the template
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function insert_googleanalytics_id($event)
	{
		$this->template->assign_var('GOOGLEANALYTICS_ID', $this->config['googleanalytics_id']);
	}
}
