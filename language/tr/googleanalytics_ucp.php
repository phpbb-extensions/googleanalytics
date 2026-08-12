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
		“%1$s”, ziyaretçilerin siteyi nasıl kullandığını anlamamıza yardımcı olmak için Google LLC (“Google”) tarafından sağlanan bir web analizi hizmeti olan Google Analyticsi kullanabilir. Google Analytics, ziyaret ettiğiniz sayfalar, her sayfada geçirilen süre ve genel kullanım kalıpları dahil olmak üzere siteyle etkileşimleriniz hakkında bilgi toplamak için çerezler ve benzeri teknolojiler kullanır.
		<br><br>
		Bu çerezler tarafından "%1$s" kullanımınıza ilişkin oluşturulan bilgiler (IP adresiniz dahil), Google tarafından Amerika Birleşik Devletleri veya diğer konumlardaki sunuculara iletilir ve saklanır. Google, bu bilgileri site kullanımınızı değerlendirmek, web sitesi etkinliği hakkında raporlar hazırlamak ve web sitesi etkinliği ve internet kullanımıyla ilgili diğer hizmetleri sağlamak için kullanır.<br><br>
		<br><br>
		Google, yasaların gerektirdiği veya söz konusu üçüncü tarafların bilgileri Google adına işlediği durumlarda bu bilgileri üçüncü taraflara da aktarabilir. Google’ın verileri nasıl topladığı ve işlediği hakkında daha fazla bilgi edinmek için lütfen Google Gizlilik Politikası’nı şu adreste inceleyin:: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Google Analyticsten çıkmak için şu adresten edinebileceğiniz Google Analytics devre dışı bırakma tarayıcı eklentisini yükleyebilirsiniz: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
