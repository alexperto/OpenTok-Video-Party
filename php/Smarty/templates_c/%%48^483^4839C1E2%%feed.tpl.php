<?php /* Smarty version 2.6.20, created on 2009-09-26 16:51:45
         compiled from /opt/local/apache2/htdocs/twitterclone/applications/view/home/feed.tpl */ ?>
<div id="tweetbox">
	<?php if (! $this->_tpl_vars['notUser']): ?>
	<fieldset>
		<legend>Get your Tweet Clone on!</legend>
		<form name="tweetBoxForm" method="POST">
			<div>
				<label>What does <?php echo $this->_tpl_vars['username']; ?>
 have to share?</label>
				<input name="tweet" maxlength="140" />
			</div>
			<div>
				<input type="hidden" name="userid" value="<?php echo $this->_tpl_vars['userid']; ?>
" />
				<input name="postTweet" type="submit" value="Share!" />
			</div>
		</form>
	</fieldset>
	<?php elseif (! $this->_tpl_vars['follows']): ?>
	<div>
		<form name="followBoxForm" method="POST">
			<div>
				<input type="hidden" name="follow" value="<?php echo $this->_tpl_vars['userid']; ?>
" />
				<input name="followButton" type="submit" value="Follow" />
			</div>
		</form>
	</div>
	<?php endif; ?>
	<fieldset>
		<legend>Feed of Tweets</legend>
		<ul>
		<?php $_from = $this->_tpl_vars['feedlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tweet']):
?>
			<li><span id="message"><?php echo $this->_tpl_vars['tweet']->getMessage(); ?>
</span><br/><span id="author"><?php echo $this->_tpl_vars['tweet']->getUserId(); ?>
 @ <?php echo $this->_tpl_vars['tweet']->getTime(); ?>
</span></li>
		<?php endforeach; endif; unset($_from); ?>
		</ul>
	</fieldset>
</div>