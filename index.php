<style>
	<?php 
		include 'style/home.css'; 
	?>
</style>
<?php
	@session_start();
	include("controller/db.php"); 

	// bepaal vanaf welk IP de bezoeker komt
	$IP = $_SERVER["REMOTE_ADDR"];
	/* test line:
	echo "Persoon is via de volgende IP aan aan het melden @IP: $IP";
	*/
	//header website
	echo" 
		<title>Inschrijvingsformulier Medewerkers Sint-Hubertus Wijchmaal</title>
		<link rel='icon' type='image/png' href='img/favicon-32x32.png' sizes='32x32' />
		<link rel='icon' type='image/png' href='img/favicon-16x16.png' sizes='16x16' />
		<div id='header'></div>
		<br />
	";
	// end header website
	//Zaterdag SQL
	$sqlzat = "SELECT * FROM zatav";
	$queryzat = mysqli_query($link, $sqlzat);
	while ( $resultszat[] = mysqli_fetch_object ( $queryzat ) );
	array_pop ( $resultszat );
	//Zondag SQL
	$sqlzondag = "SELECT * FROM zondag";
	$queryzondag = mysqli_query($link, $sqlzondag);
	while ( $resultszondag[] = mysqli_fetch_object ( $queryzondag ) );
	array_pop ( $resultszondag );
	
?>
	<h1>Inschrijvingsformulier Medewerkers Sint-Hubertus</h1>
	<br />
	<h2>Geef hieronder de gegevens in van de medewerker</h2>
	<br />
	<table id='naamwn'>
		<tr>
			<td id='vnaam'>
				<b>Voornaam:</b>
			</td>
			<td id='input'>
				<input type='text' name='vnaam' value='$vnaam'></input>
			</td>
		</tr>
		<tr>
			<td id='anaam'>
				<b>Achternaam:</b>
			</td>
			<td id='input'>
				<input type='text' name='anaam' value='$anaam'></input>
			</td>
		</tr>
	</table>
	<br />
	<br />
	<h2>Wanneer gaat hij/zij helpen?</h2>
	<br />
	<br />
	<table id='helpen'>
		<tr>
			<td id='txtOpbouwen'>
				<b>Opbouwen?</b>
			</td>
			<td id='tdOpbouwen'>
				<div class='divOpbouwen'>
					<label><input type='radio' name='Opbouwen' id='radOpbouwen1' value='1'>Ja</label>
					<label><input type='radio' name='Opbouwen' id='radOpbouwen0' value='0'>Nee</label>
				</div>
			</td>
		</tr>
		<tr>
			<td id='txtVrijdag'>
				<b>Vrijdag?</b>
			</td>
			<td id='tdVrijdag'>
				<div class='divVrijdag'>
					<label><input type='radio' name='Vrijdag' id='radVrijdag1' value='1'>Ja</label>
					<label><input type='radio' name='Vrijdag' id='radVrijdag0' value='0'>Nee</label>
				</div>
			</td>
		</tr>
		<tr>
			<td id='txtZat'>
				<b>Zaterdag overdag?</b>
			</td>
			<td id='tdZat'>
				<div class='divZat'>
					<label><input type='radio' name='Zat' id='radZat1' value='1'>Ja</label>
					<label><input type='radio' name='Zat' id='radZat0' value='0'>Nee</label>
				</div>
			</td>
		</tr>
		<tr>
			<td id='txtZatavond'>
				<b>Zaterdag avond?</b>
			</td>
			<td id='tdZatavond'>
				<select name='selectZatavond'>
					<?php foreach ( $resultszat as $optionzat ) : ?>
						<option value="<?php echo $optionzat->Wat; ?>"><?php echo $optionzat->Wat; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td id='txtZondag'>
				<b>Zondag?</b>
			</td>
			<td id='tdZondag'>
				<select name='selectZondag'>
					<?php foreach ( $resultszondag as $optionzondag ) : ?>
						<option value="<?php echo $optionzondag->Wat; ?>"><?php echo $optionzondag->Wat; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td id='txtAfbreken'>
				<b>Afbreken?</b>
			</td>
			<td id='tdAfbreken'>
				<div class='divAfbreken'>
					<label><input type='radio' name='Afbreken' id='radAfbreken1' value='1'>Ja</label>
					<label><input type='radio' name='Afbreken' id='radAbreken0' value='0'>Nee</label>
				</div>
			</td>
		</tr>
	</table>
	<table id='doorgeven'>
		<tr>
			<td id='doorgeven'>
				<center><br /><input type='submit' name='request' value='Inschrijven' id='button'></center>
			</td>
		</tr>
	</table>