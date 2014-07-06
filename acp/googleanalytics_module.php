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


public function board_config($event)
{
	if ($event['mode'] == 'settings')
	{
		$display_vars = $event['display_vars'];
		$display_vars['vars']  = array(
			'googleanalytics' => array('lang' => 'ACP_GOOGLEANALYTICS_SETTINGS', 'validate' => 'string', 'type' => 'text:20:255', 'explain' => false),
		);
		$event['display_vars'] = $display_vars;
	}
}

