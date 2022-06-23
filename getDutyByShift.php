<?php
	require("dbContext.php");
	
	header('Content-Type: application/json');

	if (isset($_GET["shifts"])){
		$resultShifts = GetDutyByShift($_GET["shifts"]);
	}

	echo json_encode($resultShifts);
?>
