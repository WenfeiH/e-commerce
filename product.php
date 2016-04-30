<?php

	ini_set('display_errors', 'on'); 

	require('credentials.php'); 
	
	try {
		echo "Connected successfully<br />"; 		

		$sql = "DROP TABLE IF EXISTS sales; "; 
		$link->exec($sql); 
		echo "Table sales has been dropped<br />";
                
                $sql = "CREATE TABLE IF NOT EXISTS sales (  orderNumber INT(6)NOT NULL AUTO_INCREMENT, 
                                                            productName VARCHAR(50) NOT NULL,
                                                            Name VARCHAR(50) NOT NULL,
                                                            email VARCHAR(50) NOT NULL,
                                                            phoneNumber VARCHAR(10),
                                                            quantity INT(11),
                                                            shipping VARCHAR(50),
                                                            address VARCHAR(50),
                                                            zipCode INT(11),
                                                            city VARCHAR(50),
                                                            state VARCHAR(50),
                                                            country VARCHAR(50),
                                                            cardType VARCHAR(50),
                                                            cardNumber VARCHAR(16),
                                                            securityCode VARCHAR(4),
                                                            nameOnCard VARCHAR(50),
                                                            PRIMARY KEY (orderNumber)
                                                            )";
		$link->exec($sql); 
		echo "Table Now Exists<br />"; 
                
//		$sql = "INSERT INTO persons (firstname,lastname) VALUES (1998, 1); "; 
//		$link->exec($sql); 
//		echo "Data Inserted<br />"; 
//		
//		$sql = "INSERT INTO persons (firstname,lastname) VALUES (2000, 2); "; 
//		$link->exec($sql); 
//		echo "Data Inserted<br />"; 
//		
//		$sql = "INSERT INTO persons (firstname,lastname) VALUES (2003, 3); "; 
//		$link->exec($sql); 
//		echo "Data Inserted<br />"; 
		
		

		
	} catch (PDOException $e){
		
		echo "Error Occurred: " . $e->getMessage(); 
		
	}
	
?>
