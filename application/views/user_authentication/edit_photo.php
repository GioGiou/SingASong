<?php
$this->load->library('session');
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
		<h2>Spremeba podatkov</h2>
		<hr/>
		<?php
		echo "<div class='error_msg'>";
		if (isset($error_message)) {
			echo $error_message;
		}
		echo validation_errors();
		echo "</div>";
		?>
		<div id="alignLogin">
			<form method="post" enctype="multipart/form-data">
		
				<label>Slika: </label>
				<input type="file" name="slika" size="20" />
				
				<input type="submit" value="Shrani spremembe" name="submit" id="buttonPrijava" /><br />
			</form>
		</div>
	</div>
</div>
