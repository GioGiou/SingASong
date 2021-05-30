<div id="profile">

	<?php
	echo "Dobrodošli <b id='welcome'>" .$this->session->userdata('Ime'). "!</b>";
	echo "<br/>";
	echo "<br/>";
	echo "Osebni podatki:";
	echo "<br/>";
	echo "Ime: " .  $this->session->userdata('Ime');
	echo "<br/>";
	echo "Priimek: " . $this->session->userdata('Email');
	echo "<br/>";
	?>
	<p id="delete"><b><a href="<?php echo site_url('user_authentication/delete_user/'.$this->session->userdata('Ime'));?>" onclick= "return confirm('Ali ste sigurni, da želite izbrisati račun?')" >Izbriši račun</a></b> 
	<b id="logout"><a href="<?php echo site_url('user_authentication/update_user');?>">Spremeni podatke</a></b> 
	<b id="logout"><a href="<?php echo site_url('user_authentication/do_upload');?>">Spremeni sliko</a></b>
	<b id="logout"><a href="logout">Odjava</a></b></p>
</div>
<br/>
