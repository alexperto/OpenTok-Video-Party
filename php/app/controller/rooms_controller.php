<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php_generator/app/model/RoomGeneratorSmarty.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/php_generator/app/model/room.php';

require_once $_SERVER['DOCUMENT_ROOT']."/php_generator/app/plugin/opentok/API_Config.php";
require_once $_SERVER['DOCUMENT_ROOT']."/php_generator/app/plugin/opentok/OpenTokSDK.php";

class RoomsController {

	private $smarty;

	public function addRoom($name, $public) {
		$roomId = Room::addRoom($name, $public);
		
		$this->individualRoom($roomId);
	}
	
	public function individualRoom($roomId) {
		$smarty = new RoomGeneratorSmarty();

		$room = Room::getRoomById($roomId);

        $apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
        $token = $apiObj->generate_token($room->getSessionId());

		$smarty->assign('title', 'OpenTok Room Generator - PHP');
		$smarty->assign('sessionId', $room->getSessionId());
		$smarty->assign('token', $token);
		$smarty->assign('roomId', $room->getRoomId());
		
		$smarty->display($_SERVER['DOCUMENT_ROOT'].'/php_generator/app/view/rooms/individual_room.tpl');
	}
}