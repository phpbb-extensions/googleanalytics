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
		“%1$s” môže používať Google Analytics, službu webovej analytiky poskytovanú spoločnosťou Google LLC (“Google”), aby nám pomohla pochopiť, ako návštevníci používajú stránku. Google Analytics používa súbory cookie a podobné technológie na zhromažďovanie informácií o vašich interakciách so stránkou vrátane navštívených stránok, času stráveného na každej stránke a všeobecných vzorcov používania.
		<br><br>
		Informácie vytvorené týmito súbormi cookie o vašom používaní “%1$s” (vrátane vašej IP adresy) sa prenášajú spoločnosti Google a ukladajú na serveroch v Spojených štátoch alebo na iných miestach. Google používa tieto informácie na vyhodnotenie vášho používania stránky, zostavovanie správ o aktivite stránky pre nás a poskytovanie ďalších služieb súvisiacich s aktivitou stránky a používaním internetu.
		<br><br>
		Google môže tieto informácie tiež odovzdať tretím stranám, ak to vyžaduje zákon alebo ak tieto tretie strany spracúvajú informácie v mene spoločnosti Google. Viac informácií o tom, ako Google zhromažďuje a spracúva údaje, nájdete v pravidlách ochrany osobných údajov Google na adrese: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Používanie Google Analytics môžete odmietnuť nainštalovaním doplnku prehliadača na zrušenie účasti v Google Analytics, ktorý je dostupný na adrese: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
