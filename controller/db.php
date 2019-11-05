<?php
$server = "sthuwi.eu";
$username = "sthuwi_subscription";
$password = "StHub1977";
$dbname = "sthuwi_subscription";
$link = mysqli_connect($server, $username, $password, $dbname);
/*
echo "<body style = 'background-color:#000000;'>";
echo "<p style = 'color:orange;'>";

if (!$link) {
    echo "<p style = 'color:orange;'>Error: Niet mogelijk om te connecteren met de MySQL." . PHP_EOL;
    echo "Debugging errornummer: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	echo "</p>";
    exit;
}

echo "<center><p style = 'color:orange;'>Goedzo: Er is een juiste connectie met MySQL! De database is juist gekoppeld.<br /></center>" . PHP_EOL;
echo "<center><p style = 'color:orange;'>Host informatie: <b>" . mysqli_get_host_info($link) . PHP_EOL;
echo "</p></center>";
*/
/*
phpinfo();

echo "</body>";

mysqli_close($link);
*/
?>