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
		<h3>Analisi</h3>
		“%1$s” può usare Google Analytics, un servizio di analisi web fornito da Google LLC (“Google”), per aiutarci a capire come i visitatori usano il sito. Google Analytics usa cookie e tecnologie simili per raccogliere informazioni sulle tue interazioni con il sito, incluse le pagine che visiti, il tempo trascorso su ciascuna pagina e i modelli generali di utilizzo.
		<br><br>
		Le informazioni generate da questi cookie sul tuo utilizzo di “%1$s” (incluso il tuo indirizzo IP) vengono trasmesse a Google e archiviate da Google su server negli Stati Uniti o in altre località. Google usa queste informazioni per valutare il tuo utilizzo del sito, compilare per noi report sull’attività del sito e fornire altri servizi relativi all’attività del sito e all’uso di internet.
		<br><br>
		Google può anche trasferire queste informazioni a terze parti quando richiesto dalla legge o quando tali terze parti trattano le informazioni per conto di Google. Per saperne di più su come Google raccoglie e tratta i dati, consulta le Norme sulla privacy di Google all’indirizzo: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Puoi disattivare Google Analytics installando il componente aggiuntivo del browser per la disattivazione di Google Analytics, disponibile all’indirizzo: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
