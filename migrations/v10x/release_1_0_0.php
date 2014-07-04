<?php
/**
*
* @package migration
* @copyright (c) 2012 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License v2
*
*/

namespace phpbb\googleanalytics\migrations\v10x;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['googleanalytics_mod_version']) && version_compare($this->config['googleanalytics_mod_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('googleanalytics_mod_version', '1.0.0')),
			//array('config.add', array('googleanalytics_active', '1')),
		);
	}
	public function update_schema()
	{
		;
	}
	public function revert_schema()
	{
		array('config.remove', array('googleanalytics_mod_version')),
		//array('config.remove', array('googleanalytics_active')),
	}
}
