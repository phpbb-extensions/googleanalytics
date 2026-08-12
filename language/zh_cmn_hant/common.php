<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'GOOGLEANALYTICS_LABEL'			=> 'Google Analytics',
	'GOOGLEANALYTICS_DESCRIPTION'	=> '追蹤您造訪的頁面、在每個頁面停留的時間，以及一般使用模式。'
));
