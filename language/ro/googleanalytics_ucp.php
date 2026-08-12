<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
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
		<h3>Analiză</h3>
		“%1$s” poate utiliza Google Analytics, un serviciu de analiză web furnizat de Google LLC (“Google”), pentru a ne ajuta să înțelegem cum folosesc vizitatorii site-ul. Google Analytics utilizează cookie-uri și tehnologii similare pentru a colecta informații despre interacțiunile dumneavoastră cu site-ul, inclusiv paginile pe care le vizitați, timpul petrecut pe fiecare pagină și tiparele generale de utilizare.
		<br><br>
		Informațiile generate de aceste cookie-uri despre utilizarea “%1$s” de către dumneavoastră (inclusiv adresa IP) sunt transmise către Google și stocate de Google pe servere din Statele Unite sau din alte locații. Google folosește aceste informații pentru a evalua utilizarea site-ului de către dumneavoastră, pentru a compila rapoarte despre activitatea site-ului pentru noi și pentru a furniza alte servicii legate de activitatea site-ului și utilizarea internetului.
		<br><br>
		Google poate transfera aceste informații și către terți atunci când legea impune acest lucru sau atunci când astfel de terți procesează informațiile în numele Google. Pentru a afla mai multe despre modul în care Google colectează și procesează date, consultați Politica de confidențialitate Google la: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Puteți renunța la Google Analytics instalând suplimentul de browser pentru renunțarea la Google Analytics, disponibil la: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
