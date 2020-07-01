<div id="main">
	<div id="login">
		<h2>Registration Form</h2>
		<hr/>
		<?php
		echo "<div class='error_msg'>";
			echo validation_errors();
		echo "</div>";
		echo form_open('user_authentication/signup');

		echo form_label('Ime: ');
		echo"<br/>";
		echo form_input('username');
		echo "<div class='error_msg'>";
		
		if (isset($message_display)) {
			echo $message_display;
		}
		echo "</div>";
		echo"<br/>";
		echo form_label('Priimek: ');
		echo"<br/>";
		$data = array(
		'type' => 'text',
		'name' => 'email_value'
		);
		echo form_input($data);
		echo"<br/>";
		echo"<br/>";
		echo form_label('Geslo: ');
		echo"<br/>";
		echo form_password('password');
		echo"<br/>";
		echo"<br/>";
		echo form_submit('submit', 'Sign Up');
		echo form_close();
		?>
		<a href="<?php echo site_url('user_authentication/signin') ?> ">For Login Click Here</a>
	</div>
</div>
