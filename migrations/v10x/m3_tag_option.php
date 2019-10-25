<?php
/**
 *
 * Google Analytics extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\googleanalytics\migrations\v10x;

/**
 * Migration stage 3: Add Google Analytics tag config option
 */
class m3_tag_option extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return array('\phpbb\googleanalytics\migrations\v10x\m1_initial_data');
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return $this->config->offsetExists('googleanalytics_tag');
	}

	/**
	 * {@inheritdoc}
	 *
	 * Note setting this option: If there is an existing Google Analytics ID set,
	 * we will set this to 0 so we continue using the legacy GA code snippet. If
	 * no Analytics ID is set, lets set this to 1 so that we promote using the new
	 * Global Tag snippet in new installations.
	 */
	public function update_data()
	{
		return array(
			array('config.add', array('googleanalytics_tag', (int) empty($this->config['googleanalytics_id']))),
		);
	}
}
