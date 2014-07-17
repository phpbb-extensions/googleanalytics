<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\googleanalytics\migrations\v10x;

class m1_initial_data extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			// Add config variable
			array('config.add', array('googleanalytics', '')),

			// Add permission
			array('permission.add', array('a_googleanalytics', true)),

			// Set permissions
			array('permission.permission_set', array('ROLE_ADMIN_FULL', 'a_googleanalytics')),
		);
	}
}
