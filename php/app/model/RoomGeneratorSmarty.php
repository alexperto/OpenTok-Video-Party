<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/php_generator/Smarty/Smarty.class.php';

class RoomGeneratorSmarty extends Smarty {

	public function __construct() {
		$this->template_dir 	= $_SERVER['DOCUMENT_ROOT'].'/php_generator/Smarty/templates';
        $this->compile_dir 		= $_SERVER['DOCUMENT_ROOT'].'/php_generator/Smarty/templates_c';
        $this->config_dir 		= $_SERVER['DOCUMENT_ROOT'].'/php_generator/Smarty/configs';
        $this->cache_dir 		= $_SERVER['DOCUMENT_ROOT'].'/php_generator/Smarty/cache';
	}
}