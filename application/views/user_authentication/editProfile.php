<div id="edit">
				<form id="editValues" method="POST">
					<label for="username">Trenutno ime: <?php echo $result['Ime'] ?></label><br>
					<input type="text" id="username" name="username" placeholder="Placeholder"><br>
					
					<label for="password">Spremeni geslo</label><br>
					<input type="password" id="password" name="password" placeholder="*****"><br>
					
					<label for="password2">Ponovno vnesi novo geslo</label><br>
					<input type="password" id="password2" name="password2" placeholder="*****"><br>
					
					<!--
					<label for="email">Trenutna elektronska pošta: <?php //echo $result['Email'] ?></label><br>
					<input type="text" id="email" name="email" placeholder="Placeholder e-mail"><br>
					-->

					<label for="description">Trenuten opis: <?php echo $result['Opis'] ?></label><br>
					<input type="text" id="description" name="description" placeholder="kratek opis"><br>

					<label for="cena">Trenutna cena: <?php echo $result['Cena'] ?>€</label><br>
					<input type="text" id="cena" name="cena" placeholder="15,70€"><br>

					<label for="kraj">Trenuten kraj in okolica: <?php echo $result['Kraj'] ?></label><br>
					<input type="text" id="kraj" name="kraj" placeholder="Ljubljana z okolico"><br>

					<label for="slika">Trenutna slika: <?php echo $result['Slika'] ?></label><br>
					<input type="file" id="slika" name="slika"><br>

					<label for="tel">Trenutna tel. številka: <?php echo $result['Tel'] ?></label><br>
					<input type="text" id="tel" name="tel" placeholder="040555111"><br>

					<label for="fb">Trenuten Facebook profil: <?php echo $result['FB'] ?></label><br>
					<input type="text" id="fb" name="fb" placeholder="TheBeatles"><br>

					<label for="insta">Trenuten Instagram profil: <?php echo $result['Insta'] ?></label><br>
					<input type="text" id="insta" name="insta" placeholder="TheBeatles"><br>

					<label for="yt">Trenuten YouTube kanal: <?php echo $result['YT'] ?></label><br>
					<input type="text" id="yt" name="yt" placeholder="UCc4K7bAqpdBP8jh1j9XZAww"><br>

					<label for="sc">Trenuten Sound Cloud profil: <?php echo $result['SC'] ?></label><br>
					<input type="text" id="sc" name="sc" placeholder="TheBeatles"><br>

					<input type="submit" name="submit" value="Posodobi">
				</form>
				<a href="<?php echo base_url() ?>index.php/glasbenik/<?php echo ($result['ID']) ?>">Prekliči</a>
				<?php echo form_close(); ?>
			</div>
