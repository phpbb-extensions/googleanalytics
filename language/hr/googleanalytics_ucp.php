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
		<h3>Analitika</h3>
		“%1$s” može koristiti Google Analytics, uslugu web analitike koju pruža Google LLC (“Google”), kako bismo lakše razumjeli kako posjetitelji koriste stranicu. Google Analytics koristi kolačiće i slične tehnologije za prikupljanje informacija o tvojim interakcijama sa stranicom, uključujući stranice koje posjećuješ, vrijeme provedeno na svakoj stranici i opće obrasce korištenja.
		<br><br>
		Informacije koje ti kolačići generiraju o tvojem korištenju “%1$s” (uključujući tvoju IP adresu) prenose se Googleu i pohranjuju na poslužiteljima u Sjedinjenim Američkim Državama ili drugim lokacijama. Google koristi te informacije za procjenu tvojeg korištenja stranice, izradu izvješća o aktivnosti stranice za nas i pružanje drugih usluga povezanih s aktivnošću stranice i korištenjem interneta.
		<br><br>
		Google također može prenijeti te informacije trećim stranama kada to zahtijeva zakon ili kada takve treće strane obrađuju informacije u ime Googlea. Više o tome kako Google prikuplja i obrađuje podatke možeš saznati u Googleovim pravilima o privatnosti na: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Google Analytics možeš isključiti instalacijom dodatka preglednika za isključivanje Google Analytics, dostupnog na: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
