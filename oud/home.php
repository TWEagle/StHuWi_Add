<style>
	<?php 
		include 'style/layout.css'; 
	?>
</style>

<?php
	@session_start();
	include("controller/db.php"); 

// bepaal vanaf welk IP de bezoeker komt
$IP = $_SERVER["REMOTE_ADDR"];
/* test line:
echo "Client is visiting from owned modem @IP: $IP";
*/


//header website
	echo" 
		<title>Inschrijvingsformulier Hondenwandeling Sint-Hubertus Wijchmaal</title>
		<link rel='icon' type='image/png' href='img/favicon-32x32.png' sizes='32x32' />
		<link rel='icon' type='image/png' href='img/favicon-16x16.png' sizes='16x16' />
		<div id='header'></div>
		<br />
	";
// end header website

		
		
// geef submitted form door aan database en geef de user een melding van verzending.
 if(isset($_POST['request'])) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		  // catch events from database event_dog
			$sql = mysqli_query($con, "select * from event_dog order by ID DESC LIMIT 1");
			while($main0 = mysqli_fetch_array($sql)) {

		// make event vars (NO VALIDATION NEEDED CAUSE FROM DATABASE TABLE event_ ! )
				$event_ID = $main0['ID'];
				$event = $main0['event_name'];
				$event_date = $main0['event_date'];
				$event_id = $main['event_id'];
				$event_date_expiration = $main0['expiration_date'];
				
		// bepaal voor welke hond de inschrijving is.
				$passcode = $_GET['passcode'];
				$ID = $_GET['ID'];
				if(isset($ID)) {
					$dog_id = $_GET['ID'];
					// indien ID onbekend
				} else {
					$ID = 1;
					$dog_id = none;
				}
			}
			
		// make event dog vars and validate if empty
		if(empty($_POST['name_dog'])) {
			$nameErr1 = 1;
			} else {
			$name_dog = $_POST['name_dog'];
		}
		if(empty($_POST['dog_breath'])) {
			$nameErr2 = 1;
			} else {
			$dog_breath = $_POST['dog_breath'];
		}
		if(empty($_POST['dog_club'])) {
			$nameErr3 = 1;
			} else {
			$dog_club = $_POST['dog_club'];
		}
		if(empty($_POST['firstname_owner'])) {
			$nameErr4 = 1;
			} else {
			$firstname_owner = $_POST['firstname_owner'];
		}
		if(empty($_POST['lastname_owner'])) {
			$nameErr5 = 1;
			} else {
			$lastname_owner = $_POST['lastname_owner'];
		}
		if(empty($_POST['street'])) {
			$nameErr6 = 1;
			} else {
			$street = $_POST['street'];
		}
		if(empty($_POST['house_number'])) {
			$nameErr7 = 1;
			} else {
			$house_number = $_POST['house_number'];
		}
		if(empty($_POST['postal_code'])) {
			$nameErr8 = 1;
			} else {
			$postal_code = $_POST['postal_code'];
		}
		if(empty($_POST['town'])) {
			$nameErr9 = 1;
			} else {
			$town = $_POST['town'];
		}
		if(empty($_POST['country'])) {
			$nameErr10 = 1;
			} else {
			$country = $_POST['country'];
		}
		if(empty($_POST['Distance'])) {
			$nameErr11 = 1;
			} else {
			$distance = $_POST['Distance'];
		}
		if(empty($_POST['mail_owner'])) {
			$nameErr12 = 1;
			} else {
			$mail_owner = $_POST['mail_owner'];	
		}
		
		$validationcheck = $nameErr1 + $nameErr2 + $nameErr3 + $nameErr4 + $nameErr5 + $nameErr6 + $nameErr7 + $nameErr8 + $nameErr9 + $nameErr10 + $nameErr11 + $nameErr12 + $nameErr13;
		if(isset($_POST['request']) && $validationcheck == 0 ) { 
		
		// Add date and time stamp for submit (has no effect on validation)
			$entrymoment = date("Y-m-d H:i:s");

		// insert vars into mysql for table deelnemers
			mysqli_query($conn, "INSERT INTO deelnemers (`id`, `event_id`, `event`, `event_date`, `event_date_expiration`, `name_dog`, `dog_breath`, `dog_club`, `firstname_owner`, `lastname_owner`, `street`, `house_number`, `postal_code`, `town`, `country`, `mail_owner`, `distance`, `dog_id`, `entry_date`, `IP`, `passphrase`) 
			VALUES ('', '$event_id', '$event', '$event_date', '$event_date_expiration', '$name_dog', '$dog_breath', '$dog_club', '$firstname_owner', '$lastname_owner', '$street', '$house_number', '$postal_code', '$town', '$country', '$mail_owner', '$distance', '$dog_id', '$entrymoment', '$IP', '$passphrase')");

		// geef melding submit form succesvol 
		print	("
						<center>
							<table id='gelukt'>
								<tr>
									<td id='gelukt1'>
										Je aanmelding is geplaatst!
									</td>
									<td id='gelukt2'>
										Je aanvraag zal uiterlijk 7 dagen voor aanvang van het evenement bevestigd worden.
									</td>
									<td id='gelukt3'>
										U wordt nu doorgestuurd binnen 5 seconden naar onze website.
									</td>
								</tr>
							</table>
						</center>
					");
			
			// return to main website in x seconds
			echo "<meta http-equiv=\"refresh\" content=\"5;url=https://sinthubertuswijchmaal.be\" />";
		// geef foutmelding indien niet alle velden ingevuld
		} else {
	//check welke vars ontbreken bij submit van gebruiker
		echo "
		<div id='foutmelding'>Het formulier is foutief ingevuld!</div>
		<br />
		<table id='errorcode'>";
		
			if (isset($nameErr1)) {
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						De naam van de hond is NIET ingevuld<br /> 
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr2)) { 
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						Het Ras van de hond is NIET ingevuld<br /> 
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr3)) {
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						De naam van de hondenclub is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr4)) {
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						De voornaam van de eigenaar is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr5)) { 
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						De achternaam van de eigenaar is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr6)) {
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						De straatnaam van de eigenaar is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr7)) {
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						Het Huisnummer van de eigenaar is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr8)) {
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						De postcode van de eigenaar is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr9)) { 
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						De woonplaats van de eigenaar is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr10)) {
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						Het land van de eigenaar is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr11)) { 
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						De wandelafstand is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			if (isset($nameErr12)) { 
				echo "
				<tr>
					<td id='foutje_empty'>
					</td>
					<td id='foutje'>
						Het email-adres van de eigenaar is NIET ingevuld<br />
					</td>
					<td id='foutje_empty'>
					</td>
				</tr>";
			}
			echo "</table>";
			
			if (isset($validationcheck)) { 
				echo "	<table id='correct'>
							<tr>
								<td id='correcttop'>
									Corrigeer aub de gevraagde velden. 
								</td>
								<td id='correctbottom'>
									De website zal terugkeren naar het door u ingevulde formulier in 5 seconden
								</td>
							</tr>
						</table>";
			}

				
						
			// redirect naar begin website opnieuw en vul reeds ingevoerde waarden automatisch in
			echo "<meta http-equiv=\"refresh\" content=\"5;url=https://inschrijving.sinthubertuswijchmaal.be/honden/index.php?passphrase=$passphrase&ID=$ID&name_dog=$name_dog&dog_breath=$dog_breath&dog_club=$dog_club&firstname_owner=$firstname_owner&lastname_owner=$lastname_owner&street=$street&house_number=$house_number&postal_code=$postal_code&town=$town&country=$country&mail_owner=$mail_owner&distance=$distance&dog_id=$dog_id \" />";
		}
	}		
}else{

// om welke event gaat het
	$sql = mysqli_query($conn, "select * from event_dog order by id DESC LIMIT 1");
	while($main = mysqli_fetch_array($sql)) {
	// geen revalidate nodig
		$event_name = $main['event_name'];
		$expiration_date = $main['expiration_date'];
		$event_date = $main['event_date'];
		$subscribe_opens = $main['subscribe_opens'];
	}

		
	echo "
		<div id='event_name'><h1>$event_name met als inschrijvingseinddatum $expiration_date </h1></div>
		<br />
		";
	
	

	
	// FORM HANDLER OPENER start hier

	?>
		<form method="post" action="<? echo $php_self; ?>">
	<?

		echo "
		</table>
		<div id='dog_info'><h2>Informatie over de hond</h2></div>
		<br />
		<table id='dog'>
			<tr>
				<td id='text'>
					<b>Naam hond</b>
				</td>
				<td id='input'>
		";
		// achterhaal welke ID opgehaald is (geen revalidate nodig)
		$ID = $_GET['ID'];
		$passcode = $_GET['passcode'];
		
		// haal de data op uit de table dogs welke gekoppeld is aan de $passphrase en koppel deze aan $vars indien deze bestaat, anders kijk of revalidate nodig is na submit
		$sql = mysqli_query($conn, "select * from dogs WHERE ID = $ID");
		while($main = mysqli_fetch_array($sql)) {
			
			$verified = $main['passphrase'];
			
			if (isset($ID) && "$passcode" != "$verified") {
				$ID = 1;
			}
			
			if (isset($_GET['name_dog'])) {
				$name_dog = $_GET['name_dog'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
				$name_dog = $main['name_dog'];
				}
			}
			if (isset($_GET['dog_breath'])) {
				$dog_breath = $_GET['dog_breath'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$dog_breath = $main['dog_breath'];
				}
			}
			if (isset($_GET['dog_club'])) {
				$dog_club = $_GET['dog_club'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$dog_club = $main['dog_club'];
				}
			}
			if (isset($_GET['firstname_owner'])) {
				$firstname_owner = $_GET['firstname_owner'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$firstname_owner = $main['firstname_owner'];
				}
			}
			if (isset($_GET['lastname_owner'])) {
				$lastname_owner = $_GET['lastname_owner'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$lastname_owner = $main['lastname_owner'];
				}
			}
			if (isset($_GET['street'])) {
				$street = $_GET['street'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$street = $main['street'];
				}
			}
			if (isset($_GET['house_number'])) {
				$house_number = $_GET['house_number'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$house_number = $main['house_number'];
				}
			}
			if (isset($_GET['postal_code'])) {
				$postal_code = $_GET['postal_code'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$postal_code = $main['postal_code'];
				}
			}
			if (isset($_GET['town'])) {
				$town = $_GET['town'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$town = $main['town'];
				}
			}
			if (isset($_GET['country'])) {
				$country = $_GET['country'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$country = $main['country'];
				}
			}
			if (isset($_GET['mail_owner'])) {
				$mail_owner = $_GET['mail_owner'];
				} else {
				if(isset($_GET['ID']) && "$passcode" == "$verified") {
					$mail_owner = $main['mail_owner'];
				}
			}
			
// bepaal of hond uit NL of BE komt
			if(isset($country) && $country == "NL") {
				$land = Nederland; 
				$land2 = Belgie;
				$BE_DOG = 0;
				$NL_DOG = 1;
			}
			if(isset($country) && $country == "BE") {
				$land = Belgie;
				$land2 = Nederland;
				$BE_DOG = 1;
				$NL_DOG = 0;
			}
		}
// geef formulier weer			
				echo "
							<input type='text' name='name_dog' class='name_dog' value='$name_dog'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Ras hond</b>
						</td>
						<td id='input'>
							<input type='text' name='dog_breath' value='$dog_breath'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Hondenclub</b>
						</td>
						<td id='input'>
							<input type='text' name='dog_club' value='$dog_club'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
				</table>
				<br />
				<div id='owner_info'><h2>Informatie over de eigenaar van de hond</h2></div>
				<br />
				<table id='owner'>
					<tr>
						<td id='text'>
							<b>Voornaam</b>
						</td>
						<td id='input'>
							<input type='text' name='firstname_owner' value='$firstname_owner'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Achternaam</b>
						</td>
						<td id='input'>
							<input type='text' name='lastname_owner' value='$lastname_owner'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Straat</b>
						</td>
						<td id='input'> 
							<input type='text' name='street' value='$street'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Huisnummer</b>
						</td>
						<td id='input'>
							<input type='text' name='house_number' value='$house_number'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Postcode</b>
						</td>
						<td id='input'>
							<input type='text' name='postal_code' value='$postal_code'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Gemeente</b>
						</td>
						<td id='input'>
							<input type='text' name='town' value='$town'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Land</b>
						</td>
						<td id='country'>
							<select name='country'>";
							if(isset($NL_DOG) && $NL_DOG == "1") {
								echo "	
									<option value='NL' name='country'>$land</option>
									<option value='BE' name='country'>$land2</option>
								";
							}
							if(isset($NL_DOG) && $BE_DOG == "1") {
								echo "	
									<option value='BE' name='country'>$land</option>
									<option value='NL' name='country'>$land2</option>	
								";
							}
							if(!isset($NL_DOG) && $BE_DOG == "") {
								echo "	
									<option value='BE' name='country'>Belgie</option>
									<option value='NL' name='country'>Nederland</option>	
								";
							}
							Echo "
							</select>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>Aantal KM</b>
						</td>
						<td id='distance'>
							<div class='distance'>
								<label><input type='radio' name='Distance' id='Distance6' value='6'>6km</label>
								<label><input type='radio' name='Distance' id='Distance12' value='12'>12km</label>
							</div>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
					<tr>
						<td id='text'>
							<b>E-mailadres</b>
						</td>
						<td id='input'>
							<input type='email' name='mail_owner' value='$mail_owner'></input>
						</td>
						<td id='empty'>$nameErr
						</td>
					</tr>
				</table>
				<br />
				<table id='inschrijven'>
					<tr>
						<td id='text'>
						</td>
						<td id='inschrijven'> $passphrase
							<center><br /><input type='submit' name='request' value='Inschrijven' id='button'></center>
						</td>
						<td id='empty'> $nameErr
						</td>
					</tr>
				</table>
				
			 ";
/*			echo"
				<p class='thepot'>
					<input type='text' name='honeypot' value='' alt='if you fill this field out then your email will not be sent'/>
				</p>
			";
			if(isset($_REQUEST'honeypot') && $_REQUEST'honeypot' && $_REQUESThoneypot != '')

			//Do not send the form

			else

			//Send the form
*/		

	?>
	</form>
	<?php
	echo '</center>'; 
}

// hierna kunnen inschrijvingen bekeken worden

// MARK LEMMENS aub CSS aanmaken voor het stuk hieronder//

if(isset($_GET['ID']) && "$passcode" == "$verified") {

echo "
		<center>
		<p id='contracts'>Dit zijn de wedstrijden waaraan je hebt meegedaan <font id='owner'>$firstname_owner $lastname_owner</font> !</p>
	";
Echo "
			<table id='contracts'>
				<tr id='contracts'>
					<th id='event'>Evenement <br /> Event Datum</th>
					<th id='name_dog'>Naam Hond</th>
					<th id='dog_breath'>Hondenras</th>
					<th id='dog_club'>Hondenclub</th>
					<th id='entry_date'>Inschrijvingsdatum</th>
					<th id='uitschrijving'></th>
				</tr>
	";
	
	$sql = mysqli_query($conn, "select * from deelnemers WHERE dog_id = $ID order by id ASC LIMIT 5");
	while($main1 = mysqli_fetch_array($sql)) {
	
	$event_id_sub = $main1['event_id'];
	$event_sub = $main1['event'];
	$event_date_sub = $main1['event_date'];
	$name_dog_sub = $main1['name_dog'];
	$dog_breath_sub = $main1['dog_breath'];
	$dog_club_sub = $main1['dog_club'];
	$entry_date_sub = $main1['entry_date'];
	
		echo "
			<tr id='contracts'>
				<td id='event'> $event_sub <br /> $event_date_sub </td>
				<td id='name_dog'> $name_dog_sub </td>
				<td id='dog_breath'> $dog_breath_sub </td>
				<td id='dog_club'> $dog_club_sub </td>
				<td id='entry_date'> $entry_date_sub </td>
				<td id='uitschrijving'><a href='https://inschrijving.sinthubertuswijchmaal.be/honden/uitschrijven.php?ID=$ID&passcode=$passcode&event_id=$event_id_sub '>Uitschrijven</a></td>
			</tr>
		";
	}
	echo '
			</table>
		</center>
	';		
}

?>