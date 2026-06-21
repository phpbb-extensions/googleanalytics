<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
* @Polska wersja językowa Google Analytics 1.1.0 - 21.06.2026, Mateusz Dutko (vader) www.rnavspotters.pl
*
* @copyright (c) 2025 phpBB Limited <https://www.phpbb.com>
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
	$lang = [];
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

$lang = array_merge($lang, [
	'PHPBB_ANALYTICS_PRIVACY_POLICY' => '
		<br><br>
		<h3>Analytics</h3>
		Witryna „%1$s” może korzystać z Google Analytics, usługi analityki internetowej świadczonej przez Google LLC („Google”), która pomaga nam zrozumieć, w jaki sposób użytkownicy korzystają z witryny. Google Analytics wykorzystuje pliki cookie i podobne technologie do gromadzenia informacji o interakcjach użytkownika z witryną, w tym o odwiedzanych stronach, czasie spędzonym na każdej stronie oraz ogólnych wzorcach użytkowania.
		<br><br>
		Informacje generowane przez pliki cookie dotyczące korzystania przez użytkownika z serwisu „%1$s” (w tym adres IP użytkownika) są przekazywane do Google i przechowywane przez tę firmę na serwerach w Stanach Zjednoczonych lub w innych lokalizacjach. Google wykorzystuje te informacje do oceny sposobu korzystania z serwisu przez użytkownika, sporządzania dla nas raportów dotyczących aktywności na stronie oraz świadczenia innych usług związanych z aktywnością na stronie i korzystaniem z Internetu.
		<br><br>
		Firma Google może również przekazywać te informacje podmiotom zewnętrznym, jeśli wymaga tego prawo lub jeśli podmioty te przetwarzają te informacje w imieniu Google. Aby dowiedzieć się więcej o tym, w jaki sposób firma Google gromadzi i przetwarza dane, zapoznaj się z Polityką prywatności Google pod adresem: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Można zrezygnować z usługi Google Analytics, instalując dodatek do przeglądarki blokujący Google Analytics, dostępny pod adresem: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
