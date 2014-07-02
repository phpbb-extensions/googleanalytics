<?php
/**
*
* Google Analytics extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\googleanalytics\controller;

/**
* Main controller
*/
class main_controller implements main_interface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\googleanalytics\operators\rule */
	protected $rule_operator;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string phpEx */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\config\config                $config             Config object
	* @param \phpbb\controller\helper            $helper             Controller helper object
	* @param \phpbb\template\template            $template           Template object
	* @param \phpbb\user                         $user               User object
	* @param string                              $root_path          phpBB root path
	* @param string                              $php_ext            phpEx
	* @return \phpbb\googleanalytics\controller\main_controller
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, $root_path, $php_ext)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	* Display the Google Analytics page
	*
	* @return Symfony\Component\HttpFoundation\Response A Symfony Response object
	* @access public
	*/
	public function display()
	{
		// When board rules are disbaled, redirect users back to the forum index
		if (empty($this->config['googleanalytics_enable']))
		{
			redirect(append_sid("{$this->root_path}index.$this->php_ext"));
		}

		// Add googleanalytics controller language file
		$this->user->add_lang_ext('phpbb/googleanalytics', 'googleanalytics_controller');

		$last_right_id = null; // Used to help determine when to close nesting structures
		$depth = 0; // Used to track the depth of nesting level
		$cat_counter = 1; // Numeric counter used for categories
		$rule_counter = 'a'; // Alpha counter used for rules


		// Assign values to template vars for the Google Analytics page
		$this->template->assign_vars(array(
			'GOOGLEANALYTICS_EXPLAIN'	=> $this->user->lang('GOOGLEANALYTICS_EXPLAIN', $this->config['sitename']),
		));

		// Assign breadcrumb template vars for the Google Analytics page
		$this->template->assign_block_vars('navlinks', array(
			'U_VIEW_FORUM'		=> $this->helper->route('googleanalytics_main_controller'),
			'FORUM_NAME'		=> $this->user->lang('GOOGLEANALYTICS'),
		));

		// Send all data to the template file
		return $this->helper->render('googleanalytics_controller.html', $this->user->lang('GOOGLEANALYTICS'));
	}
}
