<?
// mysql connecties
$LOCALHOST = "localhost";
$USER      = "sthuwi_inschrijving";
$PASSWORD  = "W]ec7*kT#Pu9"; 
$DB        = "sthuwi_inschrijven";

// mysql settings
$conn = mysqli_connect($LOCALHOST, $USER, $PASSWORD);
mysqli_select_db($conn, $DB);
?>
