<?php /* Smarty version 2.6.20, created on 2009-09-26 15:54:24
         compiled from /opt/local/apache2/htdocs/twitterclone/applications/view/home/home.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><?php echo $this->_tpl_vars['title']; ?>
</title>
		<link href="style/main.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="home">
			<div id="navigation">
				<!-- TODO: Use logic around login/logout. If logged in, then also include the drawing of your personal feed --> 
				<a href="/twitterclone">Home</a> | <a href="/twitterclone/register/">Register</a> | <?php if ($this->_tpl_vars['loggedIn']): ?> <a href="/twitterclone/logout/">Log Out</a> <?php else: ?> <a href="/twitterclone/login">Login</a> <?php endif; ?>
			</div>
			<hr/>
			<h2>Welcome <?php echo $this->_tpl_vars['username']; ?>
</h2>
			<div id="feed">
			<?php if ($this->_tpl_vars['loggedIn']): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '/opt/local/apache2/htdocs/twitterclone/applications/view/home/feed.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php else: ?>
				<!-- TODO: Consider putting the form here to try to increase registration. For now, just link them to the page -->
				<p>You need to <a href="/twitterclone/register/">register</a> to get the party started</p>
			<?php endif; ?>
			</div>
		</div>