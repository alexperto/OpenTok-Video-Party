<!doctype html>
<html>
	<head>
		<title>{$title}</title>
		<link href="app/view/stylesheets/main.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>Video Chat Generator</h1>
				<h3>[Start or join a video chat, invite your friends but most of all have fun!]</h3>
			</div>
			<div id="content">
				<div id="newRoom">
					<fieldset>
						<legend>Start a new party room</legend>
						<form method="post" action="room/new">
							<label for="name">Party Name:</label><input type="text" name="name" />

							<br/><br/>
							
							<label for="public">Public?</label><input id="room_public" name="public" type="checkbox" value="1" />
							
							<br/><br/>
						
							<input id="room_submit" name="commit" type="submit" value="Create Room" />
						</form>
					</fieldset>
				</div>
				<fieldset>
					<legend>Existing party rooms</legend>
					<table cellpadding="2" cellspacing="5">
						<tr>
				    		<th>Name</th>
				  		</tr>
						{foreach from=$rooms item=room}
						<tr>
							<td align="center" width="300px"><a href="room/{$room->getRoomId()}">{$room->getName()}</a></td>
						</tr>
						{/foreach}
					</table>
				</fieldset>
			</div>
			<div id="footer">
				&copy; 2011, Melih Onvural - Distributed under MIT License
			</div>
		</div>
	</body>
</html>
