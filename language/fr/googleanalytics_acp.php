<?php
/**
*
* Google Analytics. An extension for the phpBB Forum Software package.
* French translation by HTML-Edition (http://www.html-edition.com) & Galixte (http://www.galixte.com)
*
* @copyright (c) 2018 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0-only)
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_GOOGLEANALYTICS'				=> 'Google Analytics',
	'ACP_GOOGLEANALYTICS_ID'			=> 'ID Google Analytics',
	'ACP_GOOGLEANALYTICS_ID_EXPLAIN'	=> 'Saisir son ID Google Analytics, tel que : <samp>UA-000000-00</samp> or Measurement ID <samp>G-XXXXXXXXXX</samp>.<br /><br />Afin de comptabiliser précisément le nombre d’utilisateurs dans les journaux, Google Analytics est en mesure de collecter les sessions des utilisateurs enregistrées suivant leurs périphériques. Pour profiter de cette opportunité, il est nécessaire de paramétrer la fonctionnalité avancée « User-ID » depuis son compte Google Analytics. <a href="https://support.google.com/analytics/answer/3123666">Cliquer ici pour davantage d’informations <i class="icon fa-external-link fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GOOGLEANALYTICS_ID_INVALID'	=> '« %s » n’est pas un ID Google Analytics valide.<br />Ce doit être au format « UA-0000000-00 » or « G-XXXXXXXXXX ».',
	'ACP_GOOGLEANALYTICS_TAG_INVALID'	=> '“Global Site Tag (gtag.js)” must be the selected Google Analytics Script Tag when using a Measurement ID.',
	'ACP_GA_ANONYMIZE_IP'				=> 'Activer l’anonymisation de l’adresse IP',
	'ACP_GA_ANONYMIZE_IP_EXPLAIN'		=> 'Permet aux données collectées par Google Analytics d’être conformes au Règlement général sur la protection des données (RGPD). Note : l’activation de cette option peut diminuer la précision des emplacements géographiques dans les rapports.',
	'ACP_GOOGLEANALYTICS_TAG'			=> 'Script Google Analytics Tag',
	'ACP_GOOGLEANALYTICS_TAG_EXPLAIN'	=> 'Permet de choisir son code Google Analytics préféré. Global Site Tag (gtag.js) est le code actuellement recommandé par Google. Google Analytics Tag (analytics.js) est l‘ancien code. <a href="https://developers.google.com/analytics/devguides/collection/gtagjs/migration">Cliquer ici pour davantage d’informations <i class="icon fa-external-link fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GA_ANALYTICS_TAG'				=> 'Google Analytics Tag (analytics.js)',
	'ACP_GA_GTAGS_TAG'					=> 'Global Site Tag (gtag.js)',
));
