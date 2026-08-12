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
		<h3>分析</h3>
		“%1$s” 可能會使用 Google Analytics，這是由 Google LLC (“Google”) 提供的網頁分析服務，用來協助我們了解訪客如何使用網站。Google Analytics 會使用 Cookie 和類似技術，收集你與網站互動的資訊，包括你造訪的頁面、在每個頁面停留的時間，以及一般使用模式。
		<br><br>
		這些 Cookie 產生的關於你使用 “%1$s” 的資訊（包括你的 IP 位址）會傳送給 Google，並由 Google 儲存在美國或其他地點的伺服器上。Google 會使用這些資訊來評估你對網站的使用情況、為我們編製網站活動報告，並提供與網站活動和網際網路使用相關的其他服務。
		<br><br>
		在法律要求或第三方代表 Google 處理資訊的情況下，Google 也可能將這些資訊轉交給第三方。若要進一步了解 Google 如何收集和處理資料，請參閱 Google 隱私權政策：<a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>。
		<br><br>
		你可以安裝 Google Analytics 選擇停用瀏覽器外掛程式來停用 Google Analytics，外掛程式可在此取得：<a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>。
	',
]);
