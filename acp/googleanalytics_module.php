<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\googleanalytics\acp;

class googleanalytics_module
{
	public $u_action;

	function main($id, $mode)
	{
		global $phpbb_container, $request, $user;

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('phpbb.googleanalytics.admin.controller');

		// Requests
		$action = $request->variable('action', '');
		$language = $request->variable('language', 0);
		$parent_id = $request->variable('parent_id', 0);
		$rule_id = $request->variable('rule_id', 0);

		// Make the $u_action url available in the admin controller
		$admin_controller->set_page_url($this->u_action);

		// Load the "settings" or "manage" module modes
		switch($mode)
		{
			case 'settings':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'googleanalytics_settings';

				// Set the page title for our ACP page
				$this->page_title = $user->lang('ACP_GOOGLEANALYTICS_SETTINGS');

				// Load the display options handle in the admin controller
				$admin_controller->display_options();
			break;

			case 'manage':
		}
	}
}
