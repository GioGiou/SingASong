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
			<form method="POST">
				<label for="username">Username</label><br>
				<input type="text" id="username" name="username" placeholder="Placeholder"><br>
				
				<label for="password">Password</label><br>
				<input type="password" id="password" name="password"><br>
				
				<label for="password2">Re-enter password</label><br>
				<input type="password2" id="password" name="password2"><br>
				
				<label for="email">Enter your e-mail</label><br>
				<input type="text" id="email" name="email" placeholder="Placeholder e-mail"><br>

				<label for="description">Enter your description</label><br>
				<input type="text" id="description" name="description"><br>

				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
		</div>
</div>
