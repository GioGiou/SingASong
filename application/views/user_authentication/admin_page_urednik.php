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
	echo "Tvoja vloga je " . $admin;
	echo "<br/>";
	?>
	<p><b id="logout"><a href="logout">Odjava</a></b></p>
</div>
<br/>