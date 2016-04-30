<!DOCTYPE html>
<html>
    <head>
        <title>Pokemon Fans | Order Confirmtion</title>
        <link href="./css/DetailedStyle.css" rel="stylesheet" />
    </head>

    <body>
        <?php   
        ini_set('display_errors', 'on');
        require_once "credentials.php";
        include "header.html";
        
        $sql = "INSERT INTO sales (productName,Name,email,phoneNumber,quantity,shipping,address,zipCode,city,state,country,cardType,cardNumber,securityCode,nameOnCard) "
                . "VALUES (:productName,:Name,:email,:phoneNumber,:quantity,:shipping,:address,:zipCode,:city,:state,:country,:cardType,:cardNumber,:securityCode,:nameOnCard)";
        $stmt = $link->prepare($sql);
        $stmt->execute(array(':productName' => $_GET['productName'],':Name' => $_POST['lastName'].",".$_POST['firstName'],':email' => $_POST['email'],
                        ':phoneNumber' => $_POST['phoneNumber'],':quantity' => $_POST['quantity'],':shipping' => $_POST['shippingMethod'],
                        ':address' => $_POST['address1'] . $_POST['address2'],':zipCode' => $_POST['postalCode'],':city' => $_POST['city'],
                        ':state' => $_POST['state'],':country' => $_POST['country'],':cardType' => $_POST['card'],
                        ':cardNumber' => $_POST['cardNumber'],':securityCode' => $_POST['securityCode'],':nameOnCard' => $_POST['nameOnCard']));
         
        $sql="SELECT * FROM sales WHERE productName = '".$_GET['productName']."' AND Name='".$_POST['lastName'].",".$_POST['firstName']."'";
        
        foreach($link->query($sql) as $rows){
        ?>
        <div id="confirmation">
            <br>
            <h4 align="center">Your order has been submitted successfully.</h4>
            <h4 align="center">Order details are as follows.</h4>
            <table>        
                <tr>
                    <td class="firstCol">Order number:</td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['orderNumber'] ?></td>
                </tr>  
                <tr>
                    <td class="firstCol">Product: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['productName'] ?></td>
                </tr>          
                <tr>
                    <td class="firstCol">Quantity: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['quantity'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Name: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['Name']?></td>
                </tr>
                <tr>
                    <td class="firstCol">Email: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['email'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Phone Number: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['phoneNumber'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Shipping Method: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['shipping'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Address: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['address'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Postal Code: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['zipCode'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">City: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['city'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">State: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['state'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Country: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['country'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Card Type: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['cardType'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Card Number: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['cardNumber'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Security Code: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['securityCode'] ?></td>
                </tr>
                <tr>
                    <td class="firstCol">Name on Card: </td>
                    <td class="secondCol"></td>
                    <td><?php echo $rows['nameOnCard'] ?></td>
                </tr>  
            </table>
        </div>
        <?php            
        }      
        include "footer.html"
        ?>
    </body>
</html> 
