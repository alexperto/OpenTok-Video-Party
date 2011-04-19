<!doctype html>
<html>
	<head>
		<title>{$title}</title>
		<link href="../app/view/stylesheets/main.css" rel="stylesheet" type="text/css" />

		<script src="../app/view/javascripts/application.js" type="text/javascript"></script>
		<script src="http://static.opentok.com/v0.91/js/TB.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			var apiKey = 366872; 
			var sessionId = "{$sessionId}"; 
			var token = "{$token}"; 

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
			<div id="invitation">Invite your friends! Share this url: http://localhost/php_generator/room/{$roomId}</div>
			<div id="videobox">
	
			</div>
			<div id="footer">
				&copy; 2011, Melih Onvural - Distributed under MIT License
			</div>
		</div>
	</body>
</html>
