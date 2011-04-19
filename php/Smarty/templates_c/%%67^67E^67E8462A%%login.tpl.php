<?php /* Smarty version 2.6.20, created on 2009-09-26 15:37:51
         compiled from /opt/local/apache2/htdocs/twitterclone/applications/view/login/login.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><?php echo $this->_tpl_vars['title']; ?>
</title>
		<link href="style/main.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="register">
			<div id="nouser"><?php echo $this->_tpl_vars['nousererror']; ?>
</div>
			<fieldset>
				<legend>Login Form</legend>
				<form name="loginForm" method="POST">
					<div>
						<label>Username</label>
						<input type="text" maxlength="32" name="username" value="<?php echo $this->_tpl_vars['username']; ?>
" />
						<span><?php echo $this->_tpl_vars['usernameError']; ?>
</span>
					</div>
					<div>
						<label>Password</label>
						<input type="password" name="password" />
						<span><?php echo $this->_tpl_vars['passwordError']; ?>
</span>
					</div>
					<div>
						<input type="submit" value="Submit" name="submitButton" />
					</div>
				</form>
			</fieldset>
		</div>