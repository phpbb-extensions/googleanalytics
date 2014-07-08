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

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string phpEx */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\controller\helper    $controller_helper  Controller helper object
	* @param \phpbb\template\template    $template           Template object
	* @param \phpbb\user                 $user               User object
	* @param string                      $php_ext            phpEx
	* @return \phpbb\googleanalytics\event\listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $controller_helper)
	{
		$this->config = $config;
		$this->controller_helper = $controller_helper;
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
			'core.user_setup'					=> 'load_language_on_setup',
			'core.permissions'					=> 'add_permission',
			'core.acp_board_config_edit_add'	=> 'add_googleanalytics_config',
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
	* Add administrative permissions to manage Googlean Alytics
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function add_permission($event)
	{
		$permissions = $event['permissions'];
		$permissions['a_googleanalytics'] = array('lang' => 'ACL_A_GOOGLEANALYTICS', 'cat' => 'settings');
		$event['permissions'] = $permissions;
	}

	public function add_googleanalytics_config($event)
	{

		if ($event['mode'] == 'settings')
		{

			// Store display_vars event in a local variable
			$display_vars = $event['display_vars'];

			$ga_display_vars = array(
				'googleanalytics' => array('lang' => 'ACP_GOOGLEANALYTICS_SETTINGS', 'validate' => 'string', 'type' => 'text:20:255', 'explain' => false)
		    );

			// Insert config vars after...
			$insert_after = 'warnings_expire_days';

			// Rebuild new config var array
			$position = array_search($insert_after, array_keys($display_vars['vars']))- 1;

			$display_vars['vars'] = array_merge(
				array_slice($display_vars['vars'], 0, $position), $ga_display_vars, array_slice($display_vars['vars'], $position)
			);

			// Update the display_vars event with the new array
			$event['display_vars'] = array('title' => $display_vars['title'], 'vars' => $display_vars['vars']);
		}
	}
}
