<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
* Ελληνική μετάφραση [el]
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
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
	$lang = array();
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

$lang = array_merge($lang, array(
	'ACP_GOOGLEANALYTICS'				=> 'Google Analytics',
	'ACP_GOOGLEANALYTICS_ID'			=> 'Google Analytics ID',
	'ACP_GOOGLEANALYTICS_ID_EXPLAIN'	=> 'Εισάγετε το αναγνωριστικό παρακολούθησης (ID code) του Google Analytics, π.χ.: <samp>UA-000000-00</samp> or Measurement ID <samp>G-XXXXXXXXXX</samp>.<br /><br />Το Google Analytics μπορεί να παρακολουθεί εγγεγραμμένους χρήστες σας σε πολλαπλές συσκευές και συνεδρίες, για μια πιο ακριβή καταμέτρηση των χρηστών στις αναφορές σας. Για να ενεργοποιήσετε αυτή τη βελτιωμένη λειτουργία παρακολούθησης του User ID πρέπει να ρυθμίσετε το λογαριασμό σας στο Google Analytics. <a href="https://support.google.com/analytics/answer/3123666?hl=el">Πατήστε εδώ για περισσότερες πληροφορίες <i class="icon fa-external-link fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GOOGLEANALYTICS_ID_INVALID'	=> 'Το "%s" δεν είναι έγκυρο αναγνωριστικό παρακολούθησης (ID code) του Google Analytics.<br />Πρέπει να είναι μορφής “UA-000000-00” or “G-XXXXXXXXXX”.',
	'ACP_GOOGLEANALYTICS_TAG_INVALID'	=> '“Global Site Tag (gtag.js)” must be the selected Google Analytics Script Tag when using a Measurement ID.',
	'ACP_GA_ANONYMIZE_IP'				=> 'Turn on IP Anonymization',
	'ACP_GA_ANONYMIZE_IP_EXPLAIN'		=> 'Enable this option if you want the data collected by Google Analytics to be compliant with the EU‘s General Data Protection Regulation (GDPR). Note that enabling this option may slightly reduce the accuracy of geographic reporting.',
	'ACP_GOOGLEANALYTICS_TAG'			=> 'Google Analytics Script Tag',
	'ACP_GOOGLEANALYTICS_TAG_EXPLAIN'	=> 'Επιλέξτε τον προτιμώμενο κωδικό σας Google Analytics. Global Tag Site (gtag.js) είναι το τρέχον απόσπασμα που συνιστά η Google. Google Analytics Tag (analytics.js) είναι το παλιό απόσπασμα κώδικα. <a href="https://developers.google.com/analytics/devguides/collection/gtagjs/migration">Πατήστε εδώ για περισσότερες πληροφορίες <i class="icon fa-external-link fa-fw" aria-hidden="true"></i></a>.',
	'ACP_GA_ANALYTICS_TAG'				=> 'Google Analytics Tag (analytics.js)',
	'ACP_GA_GTAGS_TAG'					=> 'Global Site Tag (gtag.js)',
));
