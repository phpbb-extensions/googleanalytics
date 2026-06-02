<?php
/**
 *
 * Google Analytics extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\googleanalytics\tests\functional;

/**
 * @group functional
 */
class google_analytics_consentmanager_test extends \phpbb_functional_test_case
{
	/** @var string */
	protected $sample_ga_code = 'G-A1B2C3D4E5';

	protected static function setup_extensions()
	{
		$extensions = ['phpbb/googleanalytics'];

		if (self::is_consentmanager_available())
		{
			array_unshift($extensions, 'phpbb/consentmanager');
		}

		return $extensions;
	}

	public function test_consentmanager_enables_google_consent_mode()
	{
		if (!self::is_consentmanager_available())
		{
			self::markTestSkipped('Consent Manager extension is not available.');
		}

		$this->login();
		$this->admin_login();
		$this->add_lang('acp/board');
		$this->add_lang_ext('phpbb/googleanalytics', 'googleanalytics_acp');

		$crawler = self::request('GET', 'adm/index.php?i=acp_board&mode=settings&sid=' . $this->sid);
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = $form->getValues();
		$values['config[googleanalytics_id]'] = $this->sample_ga_code;
		$form->setValues($values);
		self::submit($form);

		$crawler = self::request('GET', 'index.php');

		self::assertSame(
			'https://www.googletagmanager.com/gtag/js?id=' . $this->sample_ga_code,
			$crawler->filter('head > script[src*="googletagmanager.com/gtag/js"]')->attr('src')
		);

		$head = $crawler->filter('head')->html();
		self::assertStringContainsString("window.gtag('consent', 'default'", $head);
		self::assertStringContainsString("'analytics_storage': 'denied'", $head);
		self::assertStringContainsString("window.consentManager.onChange(updateConsent)", $head);
		self::assertStringContainsString("window.consentManager.hasConsent('analytics') ? 'granted' : 'denied'", $head);
		self::assertStringNotContainsString("'ad_storage'", $head);
		self::assertStringNotContainsString("'ad_user_data'", $head);
		self::assertStringNotContainsString("'ad_personalization'", $head);
	}

	public function test_google_analytics_runs_normally_when_analytics_category_is_disabled()
	{
		if (!self::is_consentmanager_available())
		{
			self::markTestSkipped('Consent Manager extension is not available.');
		}

		$this->login();
		$this->admin_login();
		$this->add_lang('acp/board');
		$this->add_lang_ext('phpbb/googleanalytics', 'googleanalytics_acp');
		$this->add_lang_ext('phpbb/consentmanager', 'acp_consentmanager');

		$crawler = self::request('GET', 'adm/index.php?i=acp_board&mode=settings&sid=' . $this->sid);
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = $form->getValues();
		$values['config[googleanalytics_id]'] = $this->sample_ga_code;
		$form->setValues($values);
		self::submit($form);

		$crawler = self::request('GET', 'adm/index.php?i=-phpbb-consentmanager-acp-consentmanager_module&mode=settings&sid=' . $this->sid);
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = $form->getValues();
		$values['consentmanager_analytics_enabled'] = '0';
		$form->setValues($values);
		self::submit($form);

		$crawler = self::request('GET', 'index.php');

		self::assertSame(
			'https://www.googletagmanager.com/gtag/js?id=' . $this->sample_ga_code,
			$crawler->filter('head > script[src*="googletagmanager.com/gtag/js"]')->attr('src')
		);
		self::assertStringNotContainsString("window.gtag('consent', 'default'", $crawler->filter('head')->html());
	}

	protected static function is_consentmanager_available()
	{
		return is_file(__DIR__ . '/../../../../phpbb/consentmanager/ext.php');
	}
}
