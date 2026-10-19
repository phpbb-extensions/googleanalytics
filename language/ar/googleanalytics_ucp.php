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
	'PHPBB_ANALYTICS_PRIVACY_POLICY_TITLE'	=> 'التحليلات',
	'PHPBB_ANALYTICS_PRIVACY_POLICY_TEXT'	=> '
		قد يستخدم “%1$s” Google Analytics، وهي خدمة لتحليلات الويب تقدمها Google LLC (“Google”)، لمساعدتنا على فهم كيفية استخدام الزوار للموقع. يستخدم Google Analytics ملفات تعريف الارتباط وتقنيات مشابهة لجمع معلومات عن تفاعلك مع الموقع، بما في ذلك الصفحات التي تزورها، والوقت الذي تقضيه في كل صفحة، وأنماط الاستخدام العامة.
		<br><br>
		تُنقل المعلومات التي تنشئها ملفات تعريف الارتباط هذه عن استخدامك لـ “%1$s” (بما في ذلك عنوان IP الخاص بك) إلى Google وتُخزن على خوادم في الولايات المتحدة أو مواقع أخرى. تستخدم Google هذه المعلومات لتقييم استخدامك للموقع، وإعداد تقارير لنا عن نشاط الموقع، وتقديم خدمات أخرى متعلقة بنشاط الموقع واستخدام الإنترنت.
		<br><br>
		قد تنقل Google هذه المعلومات أيضًا إلى أطراف ثالثة عندما يتطلب القانون ذلك، أو عندما تعالج هذه الأطراف المعلومات نيابة عن Google. لمعرفة المزيد حول كيفية جمع Google للبيانات ومعالجتها، يرجى الاطلاع على سياسة خصوصية Google على: %2$s.
		<br><br>
		يمكنك إلغاء الاشتراك في Google Analytics عن طريق تثبيت إضافة المتصفح الخاصة بإلغاء الاشتراك في Google Analytics، والمتاحة على: %3$s.
	',
]);
