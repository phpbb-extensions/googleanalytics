<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
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
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'googleanalytics_manage';

				// Set the page title for our ACP page
				$this->page_title = $user->lang('ACP_GOOGLEANALYTICS_MANAGE');

				// Perform any actions submitted by the user
				switch($action)
				{
					case 'add':
						// Set the page title for our ACP page
						$this->page_title = $user->lang('ACP_GOOGLEANALYTICS_CREATE_RULE');

						// Load the add rule handle in the admin controller
						$admin_controller->add_rule($language, $parent_id);

						// Return to stop execution of this script
						return;
					break;

					case 'edit':
						// Set the page title for our ACP page
						$this->page_title = $user->lang('ACP_GOOGLEANALYTICS_EDIT_RULE');

						// Load the edit rule handle in the admin controller
						$admin_controller->edit_rule($rule_id);

						// Return to stop execution of this script
						return;
					break;

					case 'move_down':
						// Move a rule down one position
						$admin_controller->move_rule($rule_id, 'down');
					break;

					case 'move_up':
						// Move a rule up one position
						$admin_controller->move_rule($rule_id, 'up');
					break;

					case 'delete':
						// Delete a rule
						$admin_controller->delete_rule($rule_id);
					break;
				}

				// Check if a language variable was submitted and display
				// the rules for that language. If no language was submitted,
				// display the language selection menu.
				if (empty($language))
				{
					$admin_controller->display_language_selection();
				}
				else
				{
					$admin_controller->display_rules($language, $parent_id);
				}
			break;
		}
	}
}
