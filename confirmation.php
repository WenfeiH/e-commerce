<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>
		<h1>Confirmation Page</h1>
		
		<table>
			<tr>
				<td>Quantity: </td>
				<td><?php $_POST['quantity'] ?></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><?php $_POST['firstName'] . $_POST['lastName'] ?></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><?php $_POST['email'] ?></td>
			</tr>
			<tr>
				<td>Phone Number: </td>
				<td><?php $_POST['phoneNumber'] ?></td>
			</tr>
			<tr>
				<td>Shipping Method: </td>
				<td><?php $_POST['shippingMethod'] ?></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><?php $_POST['address1'] . $_POST['address2'] ?></td>
			</tr>
			<tr>
				<td>Postal Code: </td>
				<td><?php $_POST['postalCode'] ?></td>
			</tr>
			<tr>
				<td>City: </td>
				<td><?php $_POST['city'] ?></td>
			</tr>
			<tr>
				<td>State: </td>
				<td><?php $_POST['state'] ?></td>
			</tr>
			<tr>
				<td>Country: </td>
				<td><?php $_POST['country'] ?></td>
			</tr>
			<tr>
				<td>Card Type: </td>
				<td><?php $_POST['card'] ?></td>
			</tr>
			<tr>
				<td>Card Number: </td>
				<td><?php $_POST['cardNumber'] ?></td>
			</tr>
			<tr>
				<td>Security Code: </td>
				<td><?php $_POST['securityCode'] ?></td>
			</tr>
			<tr>
				<td>Name on Card: </td>
				<td><?php $_POST['nameOnCard'] ?></td>
			</tr>
		</table>
		
	
</html> 
