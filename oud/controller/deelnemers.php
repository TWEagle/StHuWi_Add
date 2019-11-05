<style>
	<?php 
		include '/home/sthuwi/inschrijving.be/honden/style/layout.css'; 
	?>
</style>

<script
	src='https://code.jquery.com/jquery-3.2.1.js'
	integrity='sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE='
	crossorigin='anonymous'>
</script>
<script type='text/javascript' src='/home/sthuwi/inschrijving.be/honden/admin/js/html2CSV.js' ></script>

<?php
	@session_start();
		include("/home/sthuwi/inschrijving.be/honden/controller/db.php"); 
?>
<!--<input value='Export as CSV 2' type='button' onclick='$('#example1').table2CSV({header:['Honden nr','Naam Hond','Ras hond','Hondenclub','Naam Eigenaar','Straat','Huisnummer','Postcode','Gemeente/stad','Land','emailadres','Afstand','Aanmeld datum','IP Adres']})'> -->
<?php

$sql = "SELECT ID, name_dog, dog_breath, dog_club, firstname_owner, lastname_owner, street, house_number, postal_code, town, country, mail_owner, distance, entry_date, IP FROM deelnemers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table id='deelnemers'><tr><th id='deelnemers'>Honden nr</th><th id='deelnemers'>Naam hond</th><th id='deelnemers'>Ras Hond</th><th id='deelnemers'>Hondenclub</th><th id='deelnemers'>Naam eigenaar</th><th id='deelnemers'>Straat</th><th id='deelnemers'>Huisnummer</th><th id='deelnemers'>Postcode</th><th id='deelnemers'>Gemeente/stad</th><th id='deelnemers'>Land</th><th id='deelnemers'>emailadres</th><th id='deelnemers'>Afstand</th><th id='deelnemers'>Aanmeld datum</th><th id='deelnemers'>IP Adres</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr id='deelnemers'><td id='deelnemers'>" . $row["ID"]. "</td><td id='deelnemers'>" . $row["name_dog"]. "</td><td id='deelnemers'>" . $row["dog_breath"]. "</td><td id='deelnemers'>" . $row["dog_club"]. "</td><td id='deelnemers'>" . $row["firstname_owner"]. " " . $row["lastname_owner"]. "</td><td id='deelnemers'>" . $row["street"]. "</td><td id='deelnemers'>" . $row["house_number"]. "</td><td id='deelnemers'>" . $row["postal_code"]. "</td><td id='deelnemers'>" . $row["town"]. "</td><td id='deelnemers'>" . $row["country"]. "</td><td id='deelnemers'>" . $row["mail_owner"]. "</td><td id='deelnemers'>" . $row["distance"]. "</td><td id='deelnemers'>" . $row["entry_date"]. "</td><td id='deelnemers'>" . $row["IP"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultaten";
}

$conn->close();
?> 