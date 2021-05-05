<div id="profile">

	<?php
	echo "Dobrodošli <b id='welcome'>" .$username. "!</b>";
	echo "<br/>";
	echo "<br/>";
	echo "Osebni podatki:";
	echo "<br/>";
	echo "Ime: " .  $username;
	echo "<br/>";
	echo "Priimek: " . $email;
	echo "<br/>";
	echo "Tvoja uloga je " . $admin;
	echo "<br/>";
	?>
	<p id="logout"><b><a href=<?php echo site_url('user_authentication/delete_user/'.$username);?> onclick='return confirm("Ali ste sigurni, da želite izbrisati račun?");'>Izbriši račun</a></b> 
	<b id="logout"><a href="<?php echo site_url('user_authentication/update_user');?>">Spremeni geslo</a></b> 
	<b id="logout"><a href="logout">Odjava</a></b></p>
</div>
<br/>
