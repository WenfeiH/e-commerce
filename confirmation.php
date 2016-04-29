<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>
		<h1>Confirmation Page</h1>
		
		<table>
			<tr>
				<td>Quantity: </td>
				<td><?php echo $_GET['quantity'] ?></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><?php echo $_GET['firstName'] . $_POST['lastName'] ?></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><?php echo $_GET['email'] ?></td>
			</tr>
			<tr>
				<td>Phone Number: </td>
				<td><?php echo $_GET['phoneNumber'] ?></td>
			</tr>
			<tr>
				<td>Shipping Method: </td>
				<td><?php echo $_GET['shippingMethod'] ?></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><?php echo $_GET['address1'] . $_POST['address2'] ?></td>
			</tr>
			<tr>
				<td>Postal Code: </td>
				<td><?php echo $_GET['postalCode'] ?></td>
			</tr>
			<tr>
				<td>City: </td>
				<td><?php echo $_GET['city'] ?></td>
			</tr>
			<tr>
				<td>State: </td>
				<td><?php echo $_GET['state'] ?></td>
			</tr>
			<tr>
				<td>Country: </td>
				<td><?php echo $_GET['country'] ?></td>
			</tr>
			<tr>
				<td>Card Type: </td>
				<td><?php echo $_GET['card'] ?></td>
			</tr>
			<tr>
				<td>Card Number: </td>
				<td><?php echo $_GET['cardNumber'] ?></td>
			</tr>
			<tr>
				<td>Security Code: </td>
				<td><?php echo $_GET['securityCode'] ?></td>
			</tr>
			<tr>
				<td>Name on Card: </td>
				<td><?php echo $_GET['nameOnCard'] ?></td>
			</tr>
		</table>
		
	
</html> 
