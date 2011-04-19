<?php /* Smarty version 2.6.20, created on 2011-04-19 01:18:30
         compiled from /opt/local/apache2/htdocs/php_generator/app/view/rooms/individual_room.tpl */ ?>
<!doctype html>
<html>
	<head>
		<title><?php echo $this->_tpl_vars['title']; ?>
</title>
		<link href="../app/view/stylesheets/main.css" rel="stylesheet" type="text/css" />

		<script src="../app/view/javascripts/application.js" type="text/javascript"></script>
		<script src="http://static.opentok.com/v0.91/js/TB.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			var apiKey = 366872; 
			var sessionId = "<?php echo $this->_tpl_vars['sessionId']; ?>
"; 
			var token = "<?php echo $this->_tpl_vars['token']; ?>
"; 

			var session;

			TB.addEventListener('exception', exceptionHandler);
			session = TB.initSession(sessionId);

			//Video chat event listeners
			session.addEventListener('sessionConnected', sessionConnectedHandler);
			session.addEventListener('streamCreated', streamCreatedHandler);
		    session.addEventListener('streamDestroyed', streamDestroyedHandler);

			session.connect(apiKey, token);
		</script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>Video Chat Generator</h1>
				<h3>[Start or join a video chat, invite your friends but most of all have fun!]</h3>
			</div>
		<div id="content">
			<div id="invitation">Invite your friends! Share this url: http://localhost/generator/room/<?php echo $this->_tpl_vars['roomId']; ?>
</div>
			<div id="videobox">
	
			</div>
			<div id="footer">
				&copy; 2011, Melih Onvural - Distributed under MIT License
			</div>
		</div>
	</body>
</html>