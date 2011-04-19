<?php

	session_start();

	switch($_GET['view']) {
		case 'add_room':
			include_once('app/controller/rooms_controller.php');
			$view = new RoomsController();
			$view->addRoom($_POST['name'], $_POST['public']);
			break;
		case 'individual_room':
			include_once('app/controller/rooms_controller.php');
			$view = new RoomsController();
			$view->individualRoom($_GET['roomId']);
			break;
		default:
			include_once('app/controller/index_controller.php');
			$view = new IndexController();
			$view->render();
	};

?>
