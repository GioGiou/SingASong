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
				
				<input type="hidden" name="username" id="name" value="<?php echo $this->session->userdata('Ime');?>"/><br /><br />
				
				<label for="password">Geslo: </label>
				<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
				
				<label for="opis">Opis: </label>
				<input type="text" name="opis" id="opis" placeholder="kratek opis"/><br/><br />
				
				<label fpr="kraj">Kraj: </label>
				<input type="text" name="kraj" id="kraj" placeholder="Ljubljana z okolico"/><br/><br />
				
				<label for="cena">Cena: </label>
				<input type="text" name="cena" id="cena" placeholder="15,70€"/><br/><br />
				
				<label for="tel">Telefon: </label>
				<input type="text" name="tel" id="tel" placeholder="040555111"/><br/><br />
				
				<label for="fb">Facebook: </label>
				<input type="text" name="fb" id="fb" placeholder="TheBeatles"/><br/><br />
				
				<label for="insta">Instagram: </label>
				<input type="text" name="insta" id="insta" placeholder="TheBeatles"/><br/><br />
				
				<label for="yt">YouTube: </label>
				<input type="text" name="yt" id="yt" placeholder="UCc4K7bAqpdBP8jh1j9XZAww"/><br/><br />
				
				<label for="sc">Sound Cloud: </label>
				<input type="text" name="sc" id="sc" placeholder="TheBeatles"/><br/><br />
				
				<input type="submit" value="Shrani spremembe" name="submit" id="buttonPrijava" /><br />
			</form>
		</div>
	</div>
</div>
