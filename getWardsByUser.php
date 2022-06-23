<?php
	require("dbContext.php");

	if (isset($_GET["nurses"])){
		$resultNurses = GetWardsByUser($_GET["nurses"]);
	}

	if (isset($resultNurses))
	{
		foreach($resultNurses as $resultNurse)
		{
			echo "<span>" . $resultNurse["name"] . "</span>";
		}
	}

?>