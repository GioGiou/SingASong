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
		<h2>Prijava v sistem</h2>
		<hr/>
		<?php echo form_open('user_authentication/signin'); ?>
		<?php
		echo "<div class='error_msg'>";
		if (isset($error_message)) {
			echo $error_message;
		}
		echo validation_errors();
		echo "</div>";
		?> <div id="alignLogin">
			<label>E-mail: </label>
			<input type="text" name="email" id="email" placeholder="email@organization.com"/><br /><br />
			<label>Geslo: </label>
			<input type="password" name="password" id="password" placeholder="**********"/><br/><br />			
		</div>
		<input type="submit" value=" Prijava " name="submit" id="buttonPrijava" /><br />
		<a href="<?php echo base_url() ?>index.php/user_authentication/signup">Registracija v sistem</a>
		<?php echo form_close(); ?>
	</div>
</div>
