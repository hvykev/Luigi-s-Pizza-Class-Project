<?php

$dbMaster = mysqli_connect("localhost","root","")
	or die("Failure to connect to database: " . mysqli_error());
mysqli_select_db($dbMaster, "luigipizzadb")
        or die("Could not find database: ".mysqli_error());

?>