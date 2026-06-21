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
		<h3>Analys</h3>
		“%1$s” kan använda Google Analytics, en webbanalystjänst som tillhandahålls av Google LLC (“Google”), för att hjälpa oss förstå hur besökare använder webbplatsen. Google Analytics använder cookies och liknande tekniker för att samla in information om dina interaktioner med webbplatsen, inklusive vilka sidor du besöker, hur lång tid du tillbringar på varje sida och allmänna användningsmönster.
		<br><br>
		Informationen som genereras av dessa cookies om din användning av “%1$s” (inklusive din IP-adress) överförs till och lagras av Google på servrar i USA eller andra platser. Google använder denna information för att utvärdera din användning av webbplatsen, sammanställa rapporter om webbplatsaktivitet åt oss och tillhandahålla andra tjänster som rör webbplatsaktivitet och internetanvändning.
		<br><br>
		Google kan också överföra denna information till tredje part när lagen kräver det eller när sådan tredje part behandlar informationen för Googles räkning. Läs mer om hur Google samlar in och behandlar data i Googles integritetspolicy på: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Du kan välja bort Google Analytics genom att installera webbläsartillägget för bortval av Google Analytics, tillgängligt på: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
