<div id="profile">

	<?php
	echo "Hello <b id='welcome'>" .$username. "!</b>";
	echo "<br/>";
	echo "<br/>";
	echo "Welcome to User Page";
	echo "<br/>";
	echo "<br/>";
	echo "Your Username is " .  $username;
	echo "<br/>";
	echo "Your Email is " . $email;
	echo "<br/>";
	echo "Your are " . $admin;
	echo "<br/>";
	?>
	<p id="logout"><b><a href=<?php echo site_url('user_authentication/delete_user/'.$username);?> onclick='return confirm("Are you sure you want to delete this user?");'>Delete</a></b> 
	<b id="logout"><a href="<?php echo site_url('user_authentication/update_user');?>">Change password</a></b> 
	<b id="logout"><a href="logout">Logout</a></b></p>
</div>
<br/>
