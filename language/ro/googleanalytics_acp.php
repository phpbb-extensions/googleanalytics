<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
* Romanian translation by Sycron (www.cs1.ro)
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
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

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_GOOGLEANALYTICS'				=> 'Google Analytics',
	'ACP_GOOGLEANALYTICS_ID'			=> 'Cod de urmarire Google Analytics ',
	'ACP_GOOGLEANALYTICS_ID_EXPLAIN'	=> 'Scrie codul tau Google Analytics de urmarire, ex: <samp>UA-0000000-00</samp>.<br /><br />Google Analytics poate urmări utilizatorii înregistrați pe mai multe dispozitive și sesiuni, pentru un număr de utilizator mai precise în rapoarte. Pentru a activa această funcționalitate îmbunătățită de utilizare ID-ul de urmărire trebuie să fie configurat în contul dvs. Google Analytics. <a href="https://support.google.com/analytics/answer/3123666">Click pentru mai multe informații</a>.',
	'ACP_GOOGLEANALYTICS_ID_INVALID'	=> '“%s” nu este un cod valid de urmarire Google Analytics.<br />Trebuie sa fie sub forma “UA-0000000-00”.',
	'ACP_GA_ANONYMIZE_IP'				=> 'Turn on IP Anonymization',
	'ACP_GA_ANONYMIZE_IP_EXPLAIN'		=> 'Enable this option if you want the data collected by Google Analytics to be compliant with the EU‘s General Data Protection Regulation (GDPR). Note that enabling this option may slightly reduce the accuracy of geographic reporting.',
));
