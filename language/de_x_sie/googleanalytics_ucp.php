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
		<h3>Analytics</h3>
		„%1$s” benutzt Google Analytics, einen Webanalyse Service von Google LLC („Google”), welcher dem Betreiber hilft zu verstehen wie Besucher unsere Seite benutzen. Google Analytics benutzt cookies und ähnliche Technologien um Informationen über ihre Interaktionen mit „%1$s“, mitunter die aufgerufenen Seiten, verbleibedauer und generelle Benutzungsmuster.
		<br><br>
		Die durch diese cookies erzeugten Informationen über die Benutzung von „%1$s“ (inklusive IP-Adressen) wird versand an und gespeicher von Google auf Servern in den Vereinigten Staaten oder anderen Standorten. Google verwendet diese Informationen um die Benutzung dieser Webseite zu evaluieren, Berichte über Aktivitäten auf der Webseite zusammen zu stellen und weitere Dienstleistungen zur verfügung zu stellen.
		<br><br>
		Google kann außerdem die Informationen an dritte Parteien weitergeben, wenn dies durch die Gesetzgebung vorgeschrieben ist oder wenn die Verarbeitung der Daten bei diesen im Auftrag von Google stattfindet. Um mehr darüber zu lernen, wie Gogole deine Daten sammelt und verarbeitet, besuchen sie Google Datenschutzerklärung: <a href="https://policies.google.com/privacy?hl=de" target="_blank">https://policies.google.com/privacy?hl=de</a>.
		<br><br>
		Sie können der Nutzung von Google Analytics wiedersprechen, indem sie das Google Analytics opt-out Browser Add-On installierst, dieses ist erhältlich unter: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
