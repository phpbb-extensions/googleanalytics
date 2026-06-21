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
		<h3>Análise</h3>
		“%1$s” pode usar Google Analytics, um serviço de análise da web fornecido pela Google LLC (“Google”), para nos ajudar a entender como os visitantes usam o site. O Google Analytics usa cookies e tecnologias semelhantes para coletar informações sobre suas interações com o site, incluindo as páginas que você visita, o tempo gasto em cada página e os padrões gerais de uso.
		<br><br>
		As informações geradas por esses cookies sobre o uso de “%1$s” por você (incluindo seu endereço IP) são transmitidas para o Google e armazenadas pelo Google em servidores nos Estados Unidos ou em outros locais. O Google usa essas informações para avaliar o uso do site por você, compilar relatórios sobre a atividade do site para nós e fornecer outros serviços relacionados à atividade do site e ao uso da internet.
		<br><br>
		O Google também pode transferir essas informações a terceiros quando exigido por lei ou quando esses terceiros processarem as informações em nome do Google. Para saber mais sobre como o Google coleta e processa dados, consulte a Política de Privacidade do Google em: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Você pode desativar o Google Analytics instalando o complemento de desativação para navegadores do Google Analytics, disponível em: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
