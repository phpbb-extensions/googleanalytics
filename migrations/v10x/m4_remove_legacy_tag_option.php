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
 * Migration stage 4: Remove legacy Google Analytics tag config option
 */
class m4_remove_legacy_tag_option extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return ['\phpbb\googleanalytics\migrations\v10x\m3_tag_option'];
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return !$this->config->offsetExists('googleanalytics_tag');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return [
			['config.remove', ['googleanalytics_tag']],
		];
	}
}
