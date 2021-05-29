<div id="main">
	<?php //changed id from login ?>
	<div id="signup">
		<h2>Registracija v sistem</h2>
		<hr/>

	<?php 

		if (isset($_SESSION['success'])){
			?> <div><?php echo 'Success'; ?></div>  <?php
		}

	?>

	<?php
		echo "<div class='error_msg'>";
			echo validation_errors();
		echo "</div>";
	?> 
		<div id="formDiv">

			<form method="POST" enctype="multipart/form-data">
				<label for="username">Ime</label><br>
				<input type="text" id="username" name="username" placeholder="Placeholder"><br>
				
				<label for="password">Geslo</label><br>
				<input type="password" id="password" name="password"><br>
				
				<label for="password2">Ponovi geslo</label><br>
				<input type="password" id="password2" name="password2"><br>
				
				<label for="email">Elektronska pošta</label><br>
				<input type="text" id="email" name="email" placeholder="Placeholder e-mail"><br>

				<label for="description">Opis</label><br>
				<input type="text" id="description" name="description"><br>

				<label for="cena">Cena</label><br>
				<input type="text" id="cena" name="cena" placeholder="15,70€"><br>

				<label for="kraj">Kraj in okolica</label><br>
				<input type="text" id="kraj" name="kraj" placeholder="Ljubljana z okolico"><br>

				<input type="submit" name="submit" value="Registracija">
			</form>
			<a href="<?php echo base_url() ?>index.php/user_authentication/signin">Prijava</a>
			<?php echo form_close(); ?>
		</div>
		</div>
</div>
