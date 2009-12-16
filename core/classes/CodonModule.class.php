<?php
/**
 * Codon PHP Framework
 *	www.nsslive.net/codon
 * Software License Agreement (BSD License)
 *
 * Copyright (c) 2008 Nabeel Shahzad, nsslive.net
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2.  Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 3. The name of the author may not be used to endorse or promote products
 *    derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR
 * IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 * IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
 * NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF
 * THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @author Nabeel Shahzad
 * @copyright Copyright (c) 2008, Nabeel Shahzad
 * @link http://www.nsslive.net/codon
 * @license BSD License
 * @package codon_core
 */

/**
 * The parent class for a module
 */
class CodonModule
{
	public static $post;
	public static $get;
	public static $activeModule;
	public $action;
	
	public $title;
	
	public function __construct()
	{
		
	}
	
	/**
	 * Initialize the parent class. Called by the MainController
	 *  when the module is created
	 *
	 */
	public function init($module_name='')
	{
		$module_name = strtolower($module_name);
				
		$this->post = Vars::$post;
		$this->get = CodonRewrite::$get;
		$this->request = Vars::$request;
			
		$this->init = true;
		$this->activeModule = MainController::$activeModule;
	}
	
	public function config($setting)
	{
		return Config::Get($setting);
	}
	
	public function get($name)
	{
		return Template::Get($name, true);
	}
	
	public function set($name, $value)
	{
		Template::Set($name, $value);
	}
	
	public function show($tpl)
	{
		Template::Show($tpl);
	}
	
	public function render($tpl)
	{
		Template::Show($tpl);
	}
	
	public function log($text, $file='log')
	{
		Debug::log($text, $file);
	}
	
	public function firephp()
	{
		include_once CORE_PATH.DS.'lib'.DS.'firebug'.DS.'FirePHP.class.php';
		
		$instance = FirePHP::getInstance(true);
		$args = func_get_args();
		return call_user_func_array(array($instance,'fb'),$args);
	}
}