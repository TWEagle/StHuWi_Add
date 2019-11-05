<?php
@session_start();
include("controller/db.php"); 
?>

<?php

$ID = $_GET['ID'];
$passcode = $_GET['passcode'];


		if(isset($_GET['passcode']) && isset($_GET['ID'])) {
				$sql = mysql_query("SELECT * FROM dogs WHERE ID = $ID");
				while($main = mysql_fetch_array($sql)) {
				
					$deelnemersnummer = $main['ID'];
					$verified = $main['passphrase'];

					if(isset($passcode) && "$passcode" == "$verified") {
						
						echo " deelnemer #$deelnemersnummer  with  passphrase $passcode";
					
					} else {
					
						echo "passcode verification failed!";
						echo "Deelnemer #Unknown";
						
					}
					
				}
				
		} else {
		
			if(isset($_GET['ID'])) {
			
				echo " er is geen passphrase opgegeven!";
			
			}

			if(isset($_GET['passcode'])) {
			
				echo " er is geen ID opgegeven!";
			
			}			
			
		}

?>