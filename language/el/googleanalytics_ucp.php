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
		<h3>Αναλυτικά στοιχεία</h3>
		Το “%1$s” ενδέχεται να χρησιμοποιεί το Google Analytics, μια υπηρεσία ανάλυσης ιστού που παρέχεται από την Google LLC (“Google”), για να μας βοηθά να κατανοούμε πώς οι επισκέπτες χρησιμοποιούν τον ιστότοπο. Το Google Analytics χρησιμοποιεί cookies και παρόμοιες τεχνολογίες για τη συλλογή πληροφοριών σχετικά με τις αλληλεπιδράσεις σας με τον ιστότοπο, συμπεριλαμβανομένων των σελίδων που επισκέπτεστε, του χρόνου που αφιερώνετε σε κάθε σελίδα και των γενικών μοτίβων χρήσης.
		<br><br>
		Οι πληροφορίες που δημιουργούνται από αυτά τα cookies σχετικά με τη χρήση του “%1$s” από εσάς (συμπεριλαμβανομένης της διεύθυνσης IP σας) μεταδίδονται και αποθηκεύονται από την Google σε διακομιστές στις Ηνωμένες Πολιτείες ή σε άλλες τοποθεσίες. Η Google χρησιμοποιεί αυτές τις πληροφορίες για να αξιολογεί τη χρήση του ιστότοπου από εσάς, να συντάσσει αναφορές σχετικά με τη δραστηριότητα του ιστότοπου για εμάς και να παρέχει άλλες υπηρεσίες σχετικές με τη δραστηριότητα του ιστότοπου και τη χρήση του διαδικτύου.
		<br><br>
		Η Google μπορεί επίσης να μεταβιβάζει αυτές τις πληροφορίες σε τρίτους όταν απαιτείται από τον νόμο ή όταν οι τρίτοι αυτοί επεξεργάζονται τις πληροφορίες για λογαριασμό της Google. Για να μάθετε περισσότερα σχετικά με τον τρόπο με τον οποίο η Google συλλέγει και επεξεργάζεται δεδομένα, ανατρέξτε στην Πολιτική απορρήτου της Google στη διεύθυνση: <a href="https://policies.google.com/privacy" target="_blank">https://policies.google.com/privacy</a>.
		<br><br>
		Μπορείτε να εξαιρεθείτε από το Google Analytics εγκαθιστώντας το πρόσθετο εξαίρεσης προγράμματος περιήγησης για το Google Analytics, διαθέσιμο στη διεύθυνση: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.
	',
]);
