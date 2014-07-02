<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\googleanalytics\migrations\v10x;

/**
* Migration stage 1: Initial schema
*/
class initial_schema extends \phpbb\db\migration\migration
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
		return array('\phpbb\db\migration\data\v310\beta4');
	}

	/**
	* Add the googleanalytics table schema to the database:
	*    googleanalytics:
	*        rule_id Rule identifier
	*        rule_language Language selection
	*        rule_left_id The left id for the tree
	*        rule_right_id The right id for the tree
	*        rule_parent_id Category to display rules from
	*        rule_anchor Anchor text
	*        rule_title Rule title
	*        rule_message Rule message
	*        rule_message_bbcode_uid Rule bbcode uid
	*        rule_message_bbcode_bitfield Rule bbcode bitfield
	*        rule_message_bbcode_options Rule bbcode options
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'googleanalytics'	=> array(
					'COLUMNS'	=> array(
						'ga_id'	=> array('UINT', null, 'auto_increment'),
					),
					'PRIMARY_KEY'	=> 'ga_id',
				),
			),
		);
	}

	/**
	* Drop the googleanalytics table schema from the database
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'googleanalytics',
			),
		);
	}
}
