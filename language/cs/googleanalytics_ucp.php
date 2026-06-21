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
		<h3>Analytika</h3>
		“%1$s” může používat Google Analytics, službu webové analytiky poskytovanou společností Google LLC (“Google”), která nám pomáhá pochopit, jak návštěvníci používají web. Google Analytics používá soubory cookie a podobné technologie ke shromažďování informací o vašich interakcích s webem, včetně navštívených stránek, času stráveného na každé stránce a obecných vzorců používání.
		<br><br>
		Informace vytvořené těmito soubory cookie o vašem používání “%1$s” (včetně vaší IP adresy) jsou přenášeny společnosti Google a ukládány na serverech ve Spojených státech nebo na jiných místech. Google tyto informace používá k vyhodnocování vašeho používání webu, k sestavování zpráv o aktivitě webu pro nás a k poskytování dalších služeb souvisejících s aktivitou webu a používáním internetu.
		<br><br>
		Google může tyto informace také předat třetím stranám, pokud to vyžaduje zákon nebo pokud tyto třetí strany zpracovávají informace jménem společnosti Google. Další informace o tom, jak Google shromažďuje a zpracovává data, najdete v zásadách ochrany soukromí Google na adrese: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Používání Google Analytics můžete odmítnout instalací doplňku prohlížeče pro odhlášení z Google Analytics, který je k dispozici na adrese: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
