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
 * Migration stage 5: Clear legacy Universal Analytics IDs
 */
class m5_clear_legacy_googleanalytics_id extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return ['\phpbb\googleanalytics\migrations\v10x\m4_remove_legacy_tag_option'];
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return !preg_match('/^UA-\d{4,9}-\d{1,4}$/', (string) $this->config['googleanalytics_id']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return [
			['config.update', ['googleanalytics_id', '']],
		];
	}
}
