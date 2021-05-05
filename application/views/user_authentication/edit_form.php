<?php
if (isset($logout_message)) {
	echo "<div class='message'>";
	echo $logout_message;
	echo "</div>";
}
?>
<?php
if (isset($message_display)) {
	echo "<div class='message'>";
	echo $message_display;
	echo "</div>";
}
?>
<div id="main">
	<div id="login">
		<h2>Spremeba gesla</h2>
		<hr/>
		<?php echo form_open('user_authentication/update_user'); ?>
		<?php
		echo "<div class='error_msg'>";
		if (isset($error_message)) {
			echo $error_message;
		}
		echo validation_errors();
		echo "</div>";
		?>
		<input type="hidden" name="username" id="name" value="<?php echo $this->session->userdata['logged_in']['username'];?>"/><br /><br />
		<label>Geslo: </label>
		<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
		<input type="submit" value="Spremeni geslo" name="submit"/><br />
		<?php echo form_close(); ?>
	</div>
</div>
