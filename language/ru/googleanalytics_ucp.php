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
		<h3>Аналитика</h3>
		“%1$s” может использовать Google Analytics, сервис веб-аналитики, предоставляемый Google LLC (“Google”), чтобы помочь нам понять, как посетители используют сайт. Google Analytics использует файлы cookie и похожие технологии для сбора информации о ваших взаимодействиях с сайтом, включая посещенные страницы, время, проведенное на каждой странице, и общие модели использования.
		<br><br>
		Информация, создаваемая этими файлами cookie о вашем использовании “%1$s” (включая ваш IP-адрес), передается Google и хранится Google на серверах в США или других местах. Google использует эту информацию для оценки вашего использования сайта, составления для нас отчетов об активности сайта и предоставления других услуг, связанных с активностью сайта и использованием интернета.
		<br><br>
		Google также может передавать эту информацию третьим лицам, когда это требуется по закону или когда такие третьи лица обрабатывают информацию от имени Google. Чтобы узнать больше о том, как Google собирает и обрабатывает данные, ознакомьтесь с Политикой конфиденциальности Google по адресу: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Вы можете отказаться от Google Analytics, установив браузерное дополнение для отключения Google Analytics, доступное по адресу: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
