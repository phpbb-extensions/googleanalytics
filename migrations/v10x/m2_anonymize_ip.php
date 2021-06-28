<?php
/**
 *
 * Google Analytics extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\googleanalytics\migrations\v10x;

/**
 * Migration stage 2: Add anonymize ip config option
 */
class m2_anonymize_ip extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return ['\phpbb\googleanalytics\migrations\v10x\m1_initial_data'];
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return [
			['config.add', ['ga_anonymize_ip', 0]],
		];
	}
}
