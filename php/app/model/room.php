<?php

require_once $_SERVER['DOCUMENT_ROOT']."/php_generator/app/config/database.php";
require_once $_SERVER['DOCUMENT_ROOT']."/php_generator/app/plugin/opentok/API_Config.php";
require_once $_SERVER['DOCUMENT_ROOT']."/php_generator/app/plugin/opentok/OpenTokSession.php";
require_once $_SERVER['DOCUMENT_ROOT']."/php_generator/app/plugin/opentok/OpenTokSDK.php";
	
class Room {

	/////////////////////////
	// CLASS VARIABLES
	/////////////////////////
	const TABLE_NAME="rooms";

	/////////////////////////
	// INSTANCE VARIABLES
	/////////////////////////
	private $isPublic;

	private $name;

	private $roomId;
	
	private $sessionId;

	/////////////////////////
	// CONSTRUCTORS
	/////////////////////////
	public function __construct($roomId, $name, $public, $sessionId) {
		$this->roomId = $roomId;
		$this->name = $name;
		$this->isPublic = $public;
		$this->sessionId = $sessionId;		
	}
	
	/////////////////////////
	// GETTERS/SETTERS
	/////////////////////////
	public function getRoomId() {
		return $this->roomId;
	}

	public function getName() {
		return $this->name;
	}
	
	public function getIsPublic() {
		return $this->isPublic;
	}
	
	public function getSessionId() {
		return $this->sessionId;
	}
	
	/////////////////////////
	// PUBLIC FUNCTIONS
	/////////////////////////
	public static function addRoom($name, $public) {
		//generate a session ID
        $apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
        $session = $apiObj->create_session($_SERVER["REMOTE_ADDR"]);
        $sessionId = $session->getSessionId();

		//add room
		$dbObj = mysql_connect(Database::database_host, Database::database_user, Database::database_password);
		mysql_select_db(Database::database_name, $dbObj);

		$query = "INSERT INTO ".self::TABLE_NAME."(name, session_id, public) VALUES('".mysql_real_escape_string($name)."', '$sessionId', '".mysql_real_escape_string($public)."')";
		
		mysql_query($query, $dbObj);
		
		$query = "SELECT room_id FROM ".self::TABLE_NAME." WHERE session_id = '$sessionId'";
		
		$result = mysql_query($query, $dbObj);

		$row = mysql_fetch_array($result);
		
		mysql_close($dbObj);
		
		return $row['room_id'];
	}
	
	public static function getRoomById($roomId) {
		$dbObj = mysql_connect(Database::database_host, Database::database_user, Database::database_password);
		mysql_select_db(Database::database_name, $dbObj);

		$query = "SELECT * FROM ".self::TABLE_NAME." WHERE room_id = ".mysql_real_escape_string($roomId);
		$result = mysql_query($query, $dbObj);

		$row = mysql_fetch_array($result);

		mysql_close($dbObj);

		return new Room($row['room_id'], $row['name'], $row['public'], $row['session_id']);
	}
	
	public static function getAllPublicRooms() {
		$dbObj = mysql_connect(Database::database_host, Database::database_user, Database::database_password);
		mysql_select_db(Database::database_name, $dbObj);
	
		$query = "SELECT * FROM ".self::TABLE_NAME." WHERE public = 1 ORDER BY room_id DESC LIMIT 25";
		$result = mysql_query($query, $dbObj);
		mysql_close($dbObj);

		$rooms = array();
		if($result) {
			while($row = mysql_fetch_array($result)) {
				$rooms[] = new Room($row['room_id'], $row['name'], $row['public'], $row['session_id']);
			}
		}

		return $rooms;
	}
}