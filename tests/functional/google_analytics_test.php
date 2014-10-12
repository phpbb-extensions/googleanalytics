<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\googleanalytics\tests\functional;

/**
* @group functional
*/
class google_analytics_test extends \phpbb_functional_test_case
{
	protected $sample_ga_code = 'UA-000000-00';

	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	* @access static
	*/
	static protected function setup_extensions()
	{
		return array('phpbb/googleanalytics');
	}

	/**
	* Test Google Analytics ACP page and save settings
	*
	* @access public
	*/
	public function test_set_acp_settings()
	{
		$this->login();
		$this->admin_login();

		// Add language files
		$this->add_lang('acp/board');
		$this->add_lang_ext('phpbb/googleanalytics', 'googleanalytics_acp');

		$found = false;

		// Load ACP board settings page
		$crawler = self::request('GET', 'adm/index.php?i=acp_board&mode=settings&sid=' . $this->sid);

		// Test that GA settings field is found in the correct position (after SYSTEM_TIMEZONE)
		$nodes = $crawler->filter('#acp_board > fieldset > dl > dt > label')->extract(array('_text'));
		foreach ($nodes as $key => $config_name)
		{
			if (strpos($config_name, $this->lang('SYSTEM_TIMEZONE')) !== 0)
			{
				continue;
			}

			$found = true;

			$this->assertContainsLang('ACP_GOOGLEANALYTICS_ID', $nodes[$key + 1]);
		}

		// If GA settings not found where expected, test if they exist on page at all
		if (!$found)
		{
			$this->assertContainsLang('ACP_GOOGLEANALYTICS_ID', $crawler->text());
		}

		// Set GA form values
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = $form->getValues();
		$values['config[googleanalytics_id]'] = $this->sample_ga_code;
		$form->setValues($values);

		// Submit form and test success
		$crawler = self::submit($form);
		$this->assertContainsLang('CONFIG_UPDATED', $crawler->filter('.successbox')->text());
	}

	/**
	* Test Google Analytics code appears as expected
	*
	* @access public
	*/
	public function test_google_analytics_code()
	{
		$crawler = self::request('GET', 'index.php');
		$this->assertContains($this->sample_ga_code, $crawler->filter('head > script')->text());
	}
}
