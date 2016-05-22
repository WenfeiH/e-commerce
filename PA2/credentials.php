<?php
	
	$hostname = 'sylvester-mccoy-v3.ics.uci.edu'; 
	$database = 'inf124grp22'; 
	$username = 'inf124grp22'; 
	$password = '4Rupraw&'; 
        $link = new PDO("mysql:host=" . $hostname . ";dbname=" . $database . ";", $username, $password); 
	$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
?>