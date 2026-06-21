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
		“%1$s” kan bruge Google Analytics, en webanalysetjeneste leveret af Google LLC (“Google”), til at hjælpe os med at forstå, hvordan besøgende bruger webstedet. Google Analytics bruger cookies og lignende teknologier til at indsamle oplysninger om dine interaktioner med webstedet, herunder de sider du besøger, den tid du bruger på hver side, og generelle brugsmønstre.
		<br><br>
		De oplysninger, som disse cookies genererer om din brug af “%1$s” (herunder din IP-adresse), sendes til og gemmes af Google på servere i USA eller andre steder. Google bruger disse oplysninger til at evaluere din brug af webstedet, udarbejde rapporter om webstedsaktivitet til os og levere andre tjenester vedrørende webstedsaktivitet og internetbrug.
		<br><br>
		Google kan også overføre disse oplysninger til tredjeparter, hvor loven kræver det, eller hvor sådanne tredjeparter behandler oplysningerne på Googles vegne. Du kan læse mere om, hvordan Google indsamler og behandler data, i Googles privatlivspolitik på: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Du kan fravælge Google Analytics ved at installere browsertilføjelsen til fravalg af Google Analytics, som findes på: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
