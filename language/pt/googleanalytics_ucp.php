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
		“%1$s” pode utilizar o Google Analytics, um serviço de análise da web fornecido pela Google LLC (“Google”), para nos ajudar a compreender como os visitantes utilizam o website. O Google Analytics utiliza cookies e tecnologias semelhantes para recolher informações sobre as suas interações com o website, incluindo as páginas que visita, o tempo gasto em cada página e os padrões gerais de utilização.
		<br><br>
		As informações geradas por estes cookies sobre a sua utilização do “%1$s” (incluindo o seu endereço IP) são transmitidas e armazenadas pela Google em servidores nos Estados Unidos ou noutros locais. O Google utiliza esta informação para avaliar a sua utilização do site, compilar relatórios sobre a atividade do site para nós e fornecer outros serviços relacionados com a atividade do site e a utilização da internet.
		<br><br>
		O Google também poderá transferir estas informações para terceiros quando tal for exigido por lei ou quando esses terceiros processarem as informações em nome do Google. Para saber mais sobre a forma como o Google recolhe e processa dados, consulte a Política de Privacidade do Google em: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Pode optar por não participar no Google Analytics instalando o complemento de navegador para desativação do Google Analytics, disponível em: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
