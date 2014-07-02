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

class googleanalytics_info
{
	function module()
	{
		return array(
			'filename'	=> '\phpbb\googleanalytics\acp\googleanalytics_module',
			'title'		=> 'ACP_GOOGLEANALYTICS',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_GOOGLEANALYTICS_SETTINGS', 'auth' => 'ext_phpbb/googleanalytics && acl_a_googleanalytics', 'cat' => array('ACP_GOOGLEANALYTICS')),
				'manage'	=> array('title' => 'ACP_GOOGLEANALYTICS_MANAGE', 'auth' => 'ext_phpbb/googleanalytics && acl_a_googleanalytics', 'cat' => array('ACP_GOOGLEANALYTICS')),
			),
		);
	}
}
