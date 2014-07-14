<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\googleanalytics\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\template\template    $template           Template object
	* @return \phpbb\boardrules\event\listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->template = $template;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.common'	=> 'load_google_analytics',
		);
	}

	/**
	* Load Google Analytics js code
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function load_google_analytics($event)
	{
		$this->template->assign_vars(array(
			'S_GOOGLE_ANALYTICS_ENABLE'	=> (!empty($this->config['googleanalytics'])) ? true : false,
			'GOOGLE_ANALYTICS_ID'		=> $this->config['googleanalytics'],
		));
	}
}
