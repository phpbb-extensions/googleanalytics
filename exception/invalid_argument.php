<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\googleanalytics\exception;

/**
* InvalidArgument exception
*/
class invalid_argument extends base
{
	/**
	* Translate this exception
	*
	* @param \phpbb\user $user
	* @return string
	* @access public
	*/
	public function get_message(\phpbb\user $user)
	{
		return $this->translate_portions($user, $this->message_full, 'EXCEPTION_INVALID_ARGUMENT');
	}
}
