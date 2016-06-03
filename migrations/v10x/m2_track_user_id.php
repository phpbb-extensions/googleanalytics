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

/**
* Migration stage 2: Add default config value for user id tracking
*/
class m2_track_user_id extends \phpbb\db\migration\migration
{
	/**
	* Assign migration file dependencies for this migration
	*
	* @return array Array of migration files
	* @static
	* @access public
	*/
	static public function depends_on()
	{
		return array(
			'\phpbb\db\migration\data\v310\gold',
			'\phpbb\googleanalytics\migrations\v10x\m1_initial_data'
		);
	}

	/**
	* Add Google Analytics data to the database.
	*
	* @return array Array of table data
	* @access public
	*/
	public function update_data()
	{
		return array(
			array('config.add', array('googleanalytics_track_user_id', 0)),
		);
	}
}
