<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php_generator/app/model/RoomGeneratorSmarty.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/php_generator/app/model/room.php';

class IndexController {

	private $smarty;

	public function render() {

		$this->smarty = new RoomGeneratorSmarty();

		$this->smarty->assign('title', 'OpenTok Room Generator - PHP');
		$rooms = Room::getAllPublicRooms();
		$this->smarty->assign('rooms', $rooms);
		
		$this->smarty->display($_SERVER['DOCUMENT_ROOT'].'/php_generator/app/view/index.tpl');

	}	
}