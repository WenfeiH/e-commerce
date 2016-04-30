<?php
	
		$shippingMethodArray = array("Overnight" => 1.3, "2-Days Expedited" => 1.25, "6-Days Ground" => 1.2, "Express" => 1.15, "Free" => 1.0);
		
		if (!isset($_REQUEST["shippingMethod"]) || !isset($_REQUEST["quantity"])){
			
			echo "Shipping Method and Quantity Has To Be Filled for Total Cost"; 
			exit(0); 
			
		}
		
		$shippingMethod = $_REQUEST["shippingMethod"]; 
		$quantity = intval($_REQUEST["quantity"]); 
		$price = floatval($_REQUEST["price"]); 
		
		if (array_key_exists($shippingMethod, $shippingMethodArray))
			echo $price . " (Price) * " . $quantity . " (Quantity) * " . $shippingMethodArray[$shippingMethod] . " (Shipping Rate) = $" . number_format((float) round($price * $quantity * $shippingMethodArray[$shippingMethod], 2), 2, '.', ''); 
		else 
			echo "Shipping Method and Quantity Has To Be Filled for Total Cost";
	
?>