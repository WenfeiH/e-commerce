<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>

		<?php
			ini_set('display_errors', 'on');
			require('credentials.php');
			$parts = parse_url($_SERVER['HTTP_REFERER']);
			parse_str($parts['query'], $param);
			$stmt = $link->prepare("
				INSERT INTO sales(productName, Name, email, phoneNumber, quantity, shipping, address, zipCode, city, state, country, cardType, cardNumber, securityCode, nameOnCard)
				VALUES (:productName, :Name, :email, :phoneNumber, :quantity, :shipping, :address, :zipCode, :city, :state, :country, :cardType, :cardNumber, :securityCode, :nameOnCard)
				");
			
			$stmt->bindParam(':productName', $pName);
			$stmt->bindParam(':Name', $cName);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':phoneNumber', $phone);
			$stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
			$stmt->bindParam(':shipping', $shipping);
			$stmt->bindParam(':address', $address);
			$stmt->bindParam(':zipCode', $zip);
			$stmt->bindParam(':city', $city);
			$stmt->bindParam(':state', $state);
			$stmt->bindParam(':country', $country);
			$stmt->bindParam(':cardType', $card);
			$stmt->bindParam(':cardNumber', $cardNumber);
			$stmt->bindParam(':securityCode', $securityCode);
			$stmt->bindParam(':nameOnCard', $nameOnCard);

			$pName = $param['name'];
			$cName = $_POST['firstName'] . " " . $_POST['lastName'];
			$email = $_POST['email'];
			$phone = $_POST['phoneNumber'];
			$quantity = $_POST['quantity'];
			$shipping = $_POST['shippingMethod'];
			$address = $_POST['address1'] . " " . $_POST['address2'];
			$zip = $_POST['postalCode'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$country = $_POST['country'];
			$card = $_POST['card'];
			$cardNumber = $_POST['cardNumber'];
			$securityCode = $_POST['securityCode'];
			$nameOnCard = $_POST['nameOnCard'];

			if( $stmt->execute() ) { 
		?>

		<h1>Confirmation Page</h1>
		
		<table>
			<tr>
				<td>Product: </td>
				<td><?php echo $param['name'] ?></td>
			</tr>
			<tr>
				<td>Quantity: </td>
				<td><?php echo $_POST['quantity'] ?></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><?php echo $_POST['firstName'] . $_POST['lastName'] ?></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><?php echo $_POST['email'] ?></td>
			</tr>
			<tr>
				<td>Phone Number: </td>
				<td><?php echo $_POST['phoneNumber'] ?></td>
			</tr>
			<tr>
				<td>Shipping Method: </td>
				<td><?php echo $_POST['shippingMethod'] ?></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><?php echo $_POST['address1'] . $_POST['address2'] ?></td>
			</tr>
			<tr>
				<td>Postal Code: </td>
				<td><?php echo $_POST['postalCode'] ?></td>
			</tr>
			<tr>
				<td>City: </td>
				<td><?php echo $_POST['city'] ?></td>
			</tr>
			<tr>
				<td>State: </td>
				<td><?php echo $_POST['state'] ?></td>
			</tr>
			<tr>
				<td>Country: </td>
				<td><?php echo $_POST['country'] ?></td>
			</tr>
			<tr>
				<td>Card Type: </td>
				<td><?php echo $_POST['card'] ?></td>
			</tr>
			<tr>
				<td>Card Number: </td>
				<td><?php echo $_POST['cardNumber'] ?></td>
			</tr>
			<tr>
				<td>Security Code: </td>
				<td><?php echo $_POST['securityCode'] ?></td>
			</tr>
			<tr>
				<td>Name on Card: </td>
				<td><?php echo $_POST['nameOnCard'] ?></td>
			</tr>
		</table>

		<?php
		
			} else {
				$err = $stmt->errorInfo();
				echo "<h1>Error!</h1>";
				echo "<p>" . $err[2] . "</p>";
			}
		?>


	
</html> 
