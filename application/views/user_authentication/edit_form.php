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
		<h2>Edit password</h2>
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
		<label>Password :</label>
		<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
		<input type="submit" value="Change password" name="submit"/><br />
		<a href="<?php echo base_url() ?>index.php/user_authentication/show">To SignUp Click Here</a>
		<?php echo form_close(); ?>
	</div>
</div>
