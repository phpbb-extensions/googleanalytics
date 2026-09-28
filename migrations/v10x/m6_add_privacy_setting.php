<?php
/**
 *
 * Google Analytics extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\googleanalytics\migrations\v10x;

/**
 * Migration stage 6: Add setting to show privacy agreement
 */
class m6_add_privacy_setting extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return $this->config->offsetExists('googleanalytics_show_agreement');
	}

	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return ['\phpbb\googleanalytics\migrations\v10x\m5_clear_legacy_googleanalytics_id'];
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return [
			['config.add', ['googleanalytics_show_agreement', 1]],
		];
	}
}
