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
		<h3>Analítica</h3>
		“%1$s” puede utilizar Google Analytics, un servicio de analítica web proporcionado por Google LLC (“Google”), para ayudarnos a comprender cómo utilizan el sitio los visitantes. Google Analytics utiliza cookies y tecnologías similares para recopilar información sobre tus interacciones con el sitio, incluidas las páginas que visitas, el tiempo que pasas en cada página y los patrones generales de uso.
		<br><br>
		La información generada por estas cookies sobre tu uso de “%1$s” (incluida tu dirección IP) se transmite a Google y se almacena en servidores de Estados Unidos u otras ubicaciones. Google utiliza esta información para evaluar tu uso del sitio, elaborar informes para nosotros sobre la actividad del sitio y prestar otros servicios relacionados con la actividad del sitio y el uso de internet.
		<br><br>
		Google también puede transferir esta información a terceros cuando así lo exija la ley o cuando dichos terceros procesen la información por cuenta de Google. Para obtener más información sobre cómo Google recopila y procesa datos, consulta la Política de privacidad de Google en: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Puedes inhabilitar Google Analytics instalando el complemento de inhabilitación para navegadores de Google Analytics, disponible en: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
