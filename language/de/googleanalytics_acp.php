<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
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
	'ACP_GOOGLEANALYTICS_ID'			=> 'Google Analytics-ID',
	'ACP_GOOGLEANALYTICS_ID_EXPLAIN'	=> 'Gib deine Google Analytics-ID ein, z.B.: <samp>UA-000000-00</samp> or Measurement ID <samp>G-XXXXXXXXXX</samp>.<br /><br />Google Analytics kann deine registrierten Benutzer für eine genauere Benutzerzählung über mehrere Geräte und Sitzungen hinweg verfolgen. Um diese verbesserte User ID-Funktion nutzen zu können, muss sie in deinem Google Analytics-Account aktiviert sein. <a href="https://support.google.com/analytics/answer/3123666">Klicke hier für mehr Informationen <i class="icon fa-external-link fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GOOGLEANALYTICS_ID_INVALID'	=> '“%s” ist keine valide Google Analytics-ID.<br />Sie sollte die folgende Form haben: “UA-000000-00” or “G-XXXXXXXXXX”.',
	'ACP_GOOGLEANALYTICS_TAG_INVALID'	=> '“Global Site Tag (gtag.js)” must be the selected Google Analytics Script Tag when using a Measurement ID.',
	'ACP_GA_ANONYMIZE_IP'				=> 'Turn on IP Anonymization',
	'ACP_GA_ANONYMIZE_IP_EXPLAIN'		=> 'Enable this option if you want the data collected by Google Analytics to be compliant with the EU‘s General Data Protection Regulation (GDPR). Note that enabling this option may slightly reduce the accuracy of geographic reporting.',
	'ACP_GOOGLEANALYTICS_TAG'			=> 'Google Analytics Script Tag',
	'ACP_GOOGLEANALYTICS_TAG_EXPLAIN'	=> 'Wählen Sie Ihren bevorzugten Google Analytics-Code. Global Site Tag (gtag.js) ist der aktuelle von Google empfohlene Code. Google Analytics Tag (analytics.js) ist das alte Code. <a href="https://developers.google.com/analytics/devguides/collection/gtagjs/migration">Klicken Sie hier für mehr Informationen <i class="icon fa-external-link fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GA_ANALYTICS_TAG'				=> 'Google Analytics Tag (analytics.js)',
	'ACP_GA_GTAGS_TAG'					=> 'Global Site Tag (gtag.js)',
));
