<?php

		$shippingMethodArray = array("Overnight" => 1.3, "2-Days Expedited" => 1.25, "6-Days Ground" => 1.2, "Express" => 1.15, "Free" => 1.0);

		$stateTaxRateArray = array("alabama" => 1.04, "alaska" => 1.00, "arizona" => 1.056, "arkansas" => 1.065, "california" => 1.075, "colorado" => 1.029, "connecticut" => 1.0635, "delaware" => 1.00, "florida" => 1.06, "georgia" => 1.04, "hawaii" => 1.04, "idaho" => 1.06, "illinois" => 1.0625, "indiana" => 1.07, "iowa" => 1.06, "kansas" => 1.065, "kentucky" => 1.06, "louisiana" => 1.05, "maine" => 1.055, "maryland" => 1.06, "massachusetts" => 1.0625, "michigan" => 1.06, "minnesota" => 1.06875, "mississippi" => 1.07, "missouri" => 1.04225, "montana" => 1.00, "nebraska" => 1.055, "nevada" => 1.0685, "new hampshire" => 1.00, "new jersey" => 1.07, "new mexico" => 1.05125, "new york" => 1.04, "north carolina" => 1.0475, "north dakota" => 1.05, "ohio" => 1.0575, "oklahoma" => 1.045, "oregon" => 1.00, "pennsylvania" => 1.06, "rhode island" => 1.07, "south carolina" => 1.06, "south dakota" => 1.04, "tennessee" => 1.07, "texas" => 1.0625, "utah" => 1.047, "vermont" => 1.06, "virginia" => 1.043, "washington" => 1.065, "west virginia" => 1.06, "wisconsin" => 1.05, "wyoming" => 1.04);

		$stateAbbreviationTaxRateArray = array("AL" => 1.04, "AK" => 1.00, "AZ" => 1.056, "AR" => 1.065, "CA" => 1.075, "CO" => 1.029, "CT" => 1.0635, "DE" => 1.00, "FL" => 1.06, "GA" => 1.04, "HI" => 1.04, "ID" => 1.06, "IL" => 1.0625, "IN" => 1.07, "IA" => 1.06, "KS" => 1.065, "KY" => 1.06, "LA" => 1.05, "ME" => 1.055, "MD" => 1.06, "MA" => 1.0625, "MI" => 1.06, "MN" => 1.06875, "MS" => 1.07, "MO" => 1.04225, "MT" => 1.00, "NE" => 1.055, "NV" => 1.0685, "NH" => 1.00, "NJ" => 1.07, "NM" => 1.05125, "NY" => 1.04, "NC" => 1.0475, "ND" => 1.05, "OH" => 1.0575, "OK" => 1.045, "OR" => 1.00, "PA" => 1.06, "RI" => 1.07, "SC" => 1.06, "SD" => 1.04, "TN" => 1.07, "TX" => 1.0625, "UT" => 1.047, "VT" => 1.06, "VA" => 1.043, "WA" => 1.065, "WV" => 1.06, "WI" => 1.05, "WY" => 1.04);

		if (!isset($_REQUEST["shippingMethod"]) || !isset($_REQUEST["quantity"]) || !isset($_REQUEST["state"])){

			echo "Shipping Method and Quantity Has To Be Filled for Total Cost";
			exit(0);

		}

		$shippingMethod = $_REQUEST["shippingMethod"];
		$quantity = intval($_REQUEST["quantity"]);
		$price = floatval($_REQUEST["price"]);
		$state = strtolower($_REQUEST["state"]);
		$stateUpper = strtoupper($_REQUEST["state"]);

		if (array_key_exists($shippingMethod, $shippingMethodArray) && array_key_exists($state, $stateTaxRateArray))
			echo $stateTaxRateArray[$state] . " (State Tax Rate) * " . $price . " (Price) * " . $quantity . " (Quantity) * " . $shippingMethodArray[$shippingMethod] . " (Shipping Rate) = $" . number_format((float) round($price * $quantity * $shippingMethodArray[$shippingMethod] * $stateTaxRateArray[$state], 2), 2, '.', '');

		else if (array_key_exists($shippingMethod, $shippingMethodArray) && array_key_exists($stateUpper, $stateAbbreviationTaxRateArray))
			echo $stateAbbreviationTaxRateArray[$stateUpper] . " (State Tax Rate) * " . $price . " (Price) * " . $quantity . " (Quantity) * " . $shippingMethodArray[$shippingMethod] . " (Shipping Rate) = $" . number_format((float) round($price * $quantity * $shippingMethodArray[$shippingMethod] * $stateAbbreviationTaxRateArray[$stateUpper], 2), 2, '.', '');
		else
			echo "Shipping Method and Quantity Has To Be Filled for Total Cost";

?>