<!DOCTYPE html>
<html>
    <head>
        <title>Pokemon Fans | Order Confirmtion</title>
    </head>

    <body>
        <?php   
        ini_set('display_errors', 'on');
        require_once "credentials.php";
        
        $sql = "INSERT INTO sales (orderNumber,productName,Name,email,phoneNumber,quantity,shipping,address,zipCode,city,state,country,cardType,cardNumber,securityCode,nameOnCard) "
                . "VALUES (:orderNumber,:productName,:Name,:email,:phoneNumber,:quantity,:shipping,:address,:zipCode,:city,:state,:country,:cardType,:cardNumber,:securityCode,:nameOnCard)";
        $stmt = $link->prepare($sql);
        $stmt->execute(array(':orderNumber' => $_GET['orderNumber'],':productName' => $_GET['productName'],':Name' => $_POST['lastName'].",".$_POST['firstName'],':email' => $_POST['email'],
                        ':phoneNumber' => $_POST['phoneNumber'],':quantity' => $_POST['quantity'],':shipping' => $_POST['shippingMethod'],
                        ':address' => $_POST['address1'] . $_POST['address2'],':zipCode' => $_POST['postalCode'],':city' => $_POST['city'],
                        ':state' => $_POST['state'],':country' => $_POST['country'],':cardType' => $_POST['card'],
                        ':cardNumber' => $_POST['cardNumber'],':securityCode' => $_POST['securityCode'],':nameOnCard' => $_POST['nameOnCard']));
         
        $sql="SELECT * FROM sales WHERE orderNumber = '".$_GET['orderNumber']."';";
        foreach($link->query($sql) as $rows){
        ?>
        <h1>Confirmation Page</h1>
        <table>        
            <tr>
                <td>Order number:</td>
                <td><?php echo $rows['orderNumber'] ?></td>
            </tr>  
            <tr>
                <td>Product: </td>
                <td><?php echo $rows['productName'] ?></td>
            </tr>          
            <tr>
                <td>Quantity: </td>
                <td><?php echo $rows['quantity'] ?></td>
            </tr>
            <tr>
                <td>Name: </td>
                <td><?php echo $rows['Name']?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><?php echo $rows['email'] ?></td>
            </tr>
            <tr>
                <td>Phone Number: </td>
                <td><?php echo $rows['phoneNumber'] ?></td>
            </tr>
            <tr>
                <td>Shipping Method: </td>
                <td><?php echo $rows['shipping'] ?></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><?php echo $rows['address'] ?></td>
            </tr>
            <tr>
                <td>Postal Code: </td>
                <td><?php echo $rows['zipCode'] ?></td>
            </tr>
            <tr>
                <td>City: </td>
                <td><?php echo $rows['city'] ?></td>
            </tr>
            <tr>
                <td>State: </td>
                <td><?php echo $rows['state'] ?></td>
            </tr>
            <tr>
                <td>Country: </td>
                <td><?php echo $rows['country'] ?></td>
            </tr>
            <tr>
                <td>Card Type: </td>
                <td><?php echo $rows['cardType'] ?></td>
            </tr>
            <tr>
                <td>Card Number: </td>
                <td><?php echo $rows['cardNumber'] ?></td>
            </tr>
            <tr>
                <td>Security Code: </td>
                <td><?php echo $rows['securityCode'] ?></td>
            </tr>
            <tr>
                <td>Name on Card: </td>
                <td><?php echo $rows['nameOnCard'] ?></td>
            </tr>
        </table>
        <?php            
        }      
        ?>
    </body>
</html> 
