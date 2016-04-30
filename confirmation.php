<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>
            <h1>Confirmation Page</h1>

            <table>
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
            require "credentials.php";
            $sql = "INSERT INTO sales (firstName,lastName,email,phoneNumber,quantity,shipping,address,zipCode,city,state,country,cardType,cardNumber,securityCode,nameOnCard) "
                    . "VALUES (:firstName,:lastName,:email,:phoneNumber,:quantity,:shipping,:address,:zipCode,:city,:state,:country,:cardType,:cardNumber,:securityCode,:nameOnCard)";
            $stmt = $link->prepare($sql);
            $stmt->execute(array(':firstName' => $_POST['firstName'],':lastName' => $_POST['lastName'],':email' => $_POST['email'],
                            ':phoneNumber' => $_POST['phoneNumber'],':quantity' => $_POST['quantity'],':shipping' => $_POST['shippingMethod'],
                            ':address' => $_POST['address1'] . $_POST['address2'],':zipCode' => $_POST['postalCode'],':city' => $_POST['city'],
                            ':state' => $_POST['state'],':country' => $_POST['country'],':cardType' => $_POST['card'],
                            ':cardNumber' => $_POST['cardNumber'],':securityCode' => $_POST['securityCode'],':nameOnCard' => $_POST['nameOnCard']));
            //echo $sql;
            ?>
	</body>
</html> 
