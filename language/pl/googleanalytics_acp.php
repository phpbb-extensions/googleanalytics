<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
* Polish translation by Pico (aka Pico88)
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
	'ACP_GOOGLEANALYTICS_ID'			=> 'Identyfikator śledzenia Google Analytics',
	'ACP_GOOGLEANALYTICS_ID_EXPLAIN'	=> 'Wprowadź swój identyfikator śledzenia Google Analytics, n.p.: <samp>UA-000000-00</samp> or Measurement ID <samp>G-XXXXXXXXXX</samp>.<br><br>Google Analytics może śledzić zarejestrowanych użytkowników na wielu urządzeniach i sesji, bardziej dokładne liczby użytkowników w raportach. Aby włączyć tę zwiększona funkcjonalność śledzenia identyfikator użytkownika musi być skonfigurowana na koncie Google Analytics. <a href="https://support.google.com/analytics/answer/3123666">Kliknij, aby uzyskać więcej informacji <i class="fa-arrow-up-right-from-square fas fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GOOGLEANALYTICS_ID_INVALID'	=> '“%s” nie jest prawidłowym identyfikatorem śledzenia Google Analytics.<br>Identyfikator śledzenia powinien mieć postać “UA-000000-00” or “G-XXXXXXXXXX”.',
	'ACP_GOOGLEANALYTICS_TAG_INVALID'	=> '“Global Site Tag (gtag.js)” must be the selected Google Analytics Script Tag when using a Measurement ID.',
	'ACP_GA_ANONYMIZE_IP'				=> 'Włącz anonimizację adresów IP',
	'ACP_GA_ANONYMIZE_IP_EXPLAIN'		=> 'Wybranie Tak spowoduje, że dane zbierane przez Google Analytics będą zgodne z ogólnym rozporządzeniem o ochronie danych osobowych (RODO). Włączenie tej opcji może wpłynąć na dokładność geograficznej lokalizacji użytkowników.',
	'ACP_GOOGLEANALYTICS_TAG'			=> 'Google Analytics Script Tag',
	'ACP_GOOGLEANALYTICS_TAG_EXPLAIN'	=> 'Wybierz preferowany kod Google Analytics. Global Site Tag (gtag.js) to aktualny kod zalecany przez Google. Google Analytics Tag (analytics.js) to stary kod. <a href="https://developers.google.com/analytics/devguides/collection/gtagjs/migration">Kliknij, aby uzyskać więcej informacji <i class="fa-arrow-up-right-from-square fas fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GA_ANALYTICS_TAG'				=> 'Google Analytics Tag (analytics.js)',
	'ACP_GA_GTAGS_TAG'					=> 'Global Site Tag (gtag.js)',
));
