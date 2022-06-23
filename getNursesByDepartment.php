<?php
	require("dbContext.php");

	if (isset($_GET["departments"])){
		$resultDepartments = GetNursesByDeparment($_GET["departments"]);
	}
	
	header('Content-Type: text/xml');

	echo '<?xml version="1.0" encoding="ISO-8859-1"?>
	<deparments>';
		foreach($resultDepartments as $item){
			echo "<item>";
				echo "<name>" . $item["name"] . "</name>";
			echo "</item>";
		}
	echo "</deparments>";
?>