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
		return ['phpbb/consentmanager', 'phpbb/googleanalytics'];
	}

	public function test_consentmanager_defers_google_analytics_scripts()
	{
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
			$crawler->filter('head > script[type="text/plain"][data-consent-category="analytics"][src*="googletagmanager.com/gtag/js"]')->attr('src')
		);
		self::assertGreaterThan(
			0,
			$crawler->filter('head > script[type="text/plain"][data-consent-category="analytics"]')->count()
		);
	}

	public function test_google_analytics_runs_normally_when_analytics_category_is_disabled()
	{
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
		self::assertSame(
			0,
			$crawler->filter('head > script[type="text/plain"][data-consent-category="analytics"]')->count()
		);
	}
}
