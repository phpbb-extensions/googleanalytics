<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
* Spanish translation by Raul [ThE KuKa] (www.phpbb-es.com)
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_GOOGLEANALYTICS'				=> 'Google Analytics',
	'ACP_GOOGLEANALYTICS_ID'			=> 'ID de Google Analytics',
	'ACP_GOOGLEANALYTICS_ID_EXPLAIN'	=> 'Introduce tu código ID de Google Analytics, por ejemplo: <samp>UA-000000-00</samp> or Measurement ID <samp>G-XXXXXXXXXX</samp>.<br /><br />Google Analytics puede realizar un seguimiento de tus usuarios registrados en varios dispositivos y sesiones, para obtener un número de usuarios más preciso en tus informes. Para habilitar esta función mejorada, el seguimiento de ID de usuario debe configurarse en tu cuenta de Google Analytics. <a href="https://support.google.com/analytics/answer/3123666">Clic para más información <i class="icon fa-external-link fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GOOGLEANALYTICS_ID_INVALID'	=> '“%s” no es un código ID válido de Google Analytics.<br />Debería ser de esta forma “UA-000000-00” or “G-XXXXXXXXXX”.',
	'ACP_GOOGLEANALYTICS_TAG_INVALID'	=> '“Global Site Tag (gtag.js)” must be the selected Google Analytics Script Tag when using a Measurement ID.',
	'ACP_GA_ANONYMIZE_IP'				=> 'Activar anonimización de IP',
	'ACP_GA_ANONYMIZE_IP_EXPLAIN'		=> 'Activa esta opción si deseas que los datos recopilados por Google Analytics cumplan con el Reglamento general de protección de datos de la UE (GDPR). Ten en cuenta que habilitar esta opción puede reducir ligeramente la precisión de los informes geográficos.',
	'ACP_GOOGLEANALYTICS_TAG'			=> 'Google Analytics Script Tag',
	'ACP_GOOGLEANALYTICS_TAG_EXPLAIN'	=> 'Elije tu código preferido de Google Analytics. Global Site Tag (gtag.js) es el fragmento actual recomendado por Google. Google Analytics Tag (analytics.js) es el fragmento de código antiguo. <a href="https://developers.google.com/analytics/devguides/collection/gtagjs/migration">Clic para más información <i class="icon fa-external-link fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GA_ANALYTICS_TAG'				=> 'Google Analytics Tag (analytics.js)',
	'ACP_GA_GTAGS_TAG'					=> 'Global Site Tag (gtag.js)',
));
