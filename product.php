<?php

	ini_set('display_errors', 'on'); 

	require('credentials.php'); 
	
	try {
		
		$link = new PDO("mysql:host=" . $hostname . ";dbname=" . $database . ";", $username, $password); 
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		echo "Connected successfully<br />"; 
		
		
		$sql = "CREATE DATABASE IF NOT EXISTS" . $database; 
		$link->exec($sql); 
		echo "Database " . $database . " now exists<br />"; 
		
		
		$sql = "CREATE TABLE IF NOT EXISTS products(name VARCHAR(50) NOT NULL, releaseDate int NOT NULL, generation INT NOT NULL, price DECIMAL(10,2), platform VARCHAR(50) NOT NULL, coverPokemon VARCHAR(50) NOT NULL, IGNRating DECIMAL(10,1) NOT NULL, copiesSold DECIMAL(10,2) NOT NULL, gameRegion VARCHAR(50) NOT NULL, twinPair VARCHAR(50) NOT NULL, PRIMARY KEY (name));"; 
		$link->exec($sql); 
		echo "Table Now Exists<br />"; 
		
		
		$sql = "CREATE TABLE IF NOT EXISTS sales(firstName VARCHAR(50) NOT NULL, lastName VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, phoneNumber VARCHAR(10) NOT NULL, quantity INT NOT NULL, shipping VARCHAR(50) NOT NULL, address VARCHAR(50) NOT NULL, zipCode INT NOT NULL, city VARCHAR(50) NOT NULL, state VARCHAR(2) NOT NULL, country VARCHAR(50) NOT NULL, cardType VARCHAR(50) NOT NULL, cardNumber VARCHAR(16) NOT NULL, securityCode VARCHAR(3) NOT NULL, nameOnCard VARCHAR(50) NOT NULL);"; 
		$link->exec($sql); 
		echo "Table Now Exists<br />"; 
		
		
		$sql = "INSERT INTO products VALUES ('Blue', 1998, 1, 5.00, 'GameBoy', 'Blastoise', 10.0, 23.81, 'Kanto', 'Pokemon Red'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />"; 
		
		$sql = "INSERT INTO products VALUES ('Silver', 2000, 2, 7.00, 'GameBoy Color', 'Lugia', 10.0, 23.00, 'Johto', 'Pokemon Gold'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />"; 
		
		$sql = "INSERT INTO products VALUES ('Ruby', 2003, 3, 10.00, 'GameBoy Advanced', 'Groudon', 9.5, 16.00, 'Hoenn', 'Pokemon Sapphire'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />"; 
		
		$sql = "INSERT INTO products VALUES ('Pearl', 2007, 4, 12.00, 'Nintendo DS', 'Palkia', 8.5, 18.00, 'Sinnoh', 'Pokemon Diamond'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />";
		
		$sql = "INSERT INTO products VALUES ('Black', 2011, 5, 14.00, 'Nintendo 3DS', 'Reshiram', 9.0, 15.60, 'Unova', 'Pokemon White'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />";
		
		$sql = "INSERT INTO products VALUES ('Y', 2013, 6, 16.00, 'Nintendo 3DS', 'Reshiram', 9.0, 14.46, 'Kalos', 'Pokemon X'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />";
		
		$sql = "INSERT INTO products VALUES ('Emerald', 2005, 3, 11.00, 'GameBoy Advanced', 'Rayquaza', 8.0, 5.00, 'Hoenn', 'None'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />";
		
		$sql = "INSERT INTO products VALUES ('Crystal', 2001, 2, 11.00, 'GameBoy Color', 'Suicune', 9.0, 10.00, 'Johto', 'None'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />";
		
		$sql = "INSERT INTO products VALUES ('Alpha Sapphire', 2014, 6, 18.00, 'Nintendo 3DS', 'Kyogre', 7.8, 11.46, 'Hoenn', 'None'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />";
		
		$sql = "INSERT INTO products VALUES ('Platinum', 2009, 4, 13.00, 'Nintendo DS', 'Giratina', 8.8, 7.06, 'Sinnoh', 'None'); "; 
		$link->exec($sql); 
		echo "Data Inserted<br />";
		
	} catch (PDOException $e){
		
		echo "Error Occurred: " . $e->getMessage(); 
		
	}
	
?>