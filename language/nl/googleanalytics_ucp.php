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
		<h3>Analyse</h3>
		“%1$s” kan Google Analytics gebruiken, een webanalysedienst van Google LLC (“Google”), om ons te helpen begrijpen hoe bezoekers de site gebruiken. Google Analytics gebruikt cookies en vergelijkbare technologieën om informatie te verzamelen over je interacties met de site, waaronder de pagina’s die je bezoekt, de tijd die je op elke pagina doorbrengt en algemene gebruikspatronen.
		<br><br>
		De informatie die door deze cookies wordt gegenereerd over je gebruik van “%1$s” (inclusief je IP-adres), wordt naar Google verzonden en door Google opgeslagen op servers in de Verenigde Staten of andere locaties. Google gebruikt deze informatie om je gebruik van de site te evalueren, rapporten over siteactiviteit voor ons samen te stellen en andere diensten te leveren met betrekking tot siteactiviteit en internetgebruik.
		<br><br>
		Google kan deze informatie ook overdragen aan derden wanneer dit wettelijk verplicht is of wanneer zulke derden de informatie namens Google verwerken. Meer informatie over hoe Google gegevens verzamelt en verwerkt, vind je in het privacybeleid van Google op: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Je kunt Google Analytics uitschakelen door de browseradd-on voor uitschakeling van Google Analytics te installeren, beschikbaar op: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
