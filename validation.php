<?php 
	
	function hasBadData() {
		if(preg_match("^[A-Za-z ]+$", $_POST['firstName']) === 0)
			return TRUE;

		if(preg_match("^[A-Za-z ]+$", $_POST['lastName']) === 0)
			return TRUE;

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			return TRUE;

		if(preg_match("^[[:digit:]]+$", $_POST['phoneNumber']) === 0)
			return TRUE;
		if (strlen($_POST['phoneNumber']) != 10)
			return TRUE;
		
		if(preg_match("^[[:digit:]]+$", $_POST['quantity']) === 0)
			return TRUE;

		if(preg_match("^[[:digit:]]+$", $_POST['postalCode']) === 0)
			return TRUE;
		if (strlen($_POST['postalCode']) != 5)
			return TRUE;

		if(preg_match("^[[:digit:]]+$", $_POST['cardNumber']) === 0)
			return TRUE;
		if (strlen($_POST['cardNumber']) != 16)
			return TRUE;

		if(preg_match("^[[:digit:]]+$", $_POST['securityCode']) === 0)
			return TRUE;
		if($_POST['card'] === "American Express") {
			if(strlen($_POST['securityCode']) != 4)
				return TRUE;
		} else {
			if(strlen($_POST['securityCode']) != 3)
				return TRUE;
		}

		if(preg_match("^[A-Za-z ]+$", $_POST['nameOnCard']) === 0)
			return TRUE;

		return FALSE;
	}

	function validateFormData() {
		if(strlen($_POST['firstName']) === 0 || strlen($_POST['lastName']) === 0 ||
			strlen($_POST['email']) === 0 || strlen($_POST['phoneNumber']) === 0 ||
			strlen($_POST['quantity']) === 0 || strlen($_POST['shippingMethod']) === 0 ||
			strlen($_POST['address1']) === 0 ||
			strlen($_POST['postalCode']) === 0 || strlen($_POST['city']) === 0 ||
			strlen($_POST['state']) === 0 || strlen($_POST['country']) === 0 ||
			strlen($_POST['card']) === 0 || strlen($_POST['cardNumber']) === 0 ||
			strlen($_POST['securityCode']) === 0 || strlen($_POST['nameOnCard']) === 0)
			return "<h1>Form data incomplete!</h1>
					<p>Please fill out the order form.<p>";

		if(hasBadData())
			return "<h1>Form data is incorrect!</h1>
					<p>Please fill out the order form correctly.</p>";

		return TRUE;
	}

?>