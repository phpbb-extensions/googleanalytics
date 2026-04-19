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
	'GOOGLEANALYTICS_DESCRIPTION'	=> 'Tracks the pages you visit, the time spent on each page, and general usage patterns.'
));
