<!DOCTYPE html>
<html>
    <head>
        <title>Pokemon Fans | Cancel Order</title>
        <link href="./css/DetailedStyle.css" rel="stylesheet" />
        <script src="./js/check.js" type="text/javascript"></script>
    </head>

    <body>
        <?php   
        ini_set('display_errors', 'on');
        require_once "credentials.php";
        include "header.html";
        ?> 
        <div>
            <form action="cancelOrder.php" method="post" class="search">
                <h4>Cancel an Order</h4>
                <table>
                    <tr><td>Order Number:</td><td><input type="text" name="orderNumber" id="orderNumber" size="15"></td></tr>  
                    <tr><td>First Name:</td><td><input type="text" name="firstname" id="firstname2" size="15"></td></tr>  
                    <tr><td>Last Name:</td><td><input type="text" name="lastname" id="lastname2" size="15"></td></tr>  
                    <tr>
                        <td>                    
                            <div>
                                <input type="submit" name="search" onclick="return searchcheck()" value="Search">
                            </div> 
                        </td>
                    </tr> 
                </table>   
                <p id="searchalert"></p>   
                <h4 id="finalstatus"></h4> 
            </form>
            
        
            <?php
            if (isset($_POST['search'])) {
                $first=$_POST['firstname'];
                $last=$_POST['lastname'];
                $orderNumber=$_POST['orderNumber'];
                
                $sql="SELECT * FROM sales WHERE orderNumber = '".$_POST['orderNumber']."' AND Name='".$_POST['lastname'].", ".$_POST['firstname']."'";
                $stmt = $link->prepare($sql);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    echo "<script type=text/javascript>document.getElementById('searchalert').innerHTML =''</script>"; 
                    while($rows=$stmt->FETCH(PDO::FETCH_ASSOC)){
            ?>
            
            <form class="confirm" action="cancelOrder.php" method="post">       
                <div class="recheck">
                    <input type="hidden" name="Name" value="<?php echo $rows['Name'] ?>">
                    <input type="hidden" name="orderNumber" value="<?php echo $rows['orderNumber'] ?>">
                    <table border="solid black">        
                        <tr>
                            <td class="tablestyle" >Product: </td>
                            <td class="tablestyle"><?php echo $rows['productName'] ?></td>
                        </tr>          
                        <tr>
                            <td class="tablestyle">Quantity: </td>
                            <td class="tablestyle"><?php echo $rows['quantity'] ?></td>
                        </tr>
                        <tr>
                            <td class="tablestyle">Email: </td>
                            <td class="tablestyle"><?php echo $rows['email'] ?></td>
                        </tr>
                        <tr>
                            <td class="tablestyle">Phone Number: </td>
                            <td class="tablestyle"><?php echo $rows['phoneNumber'] ?></td>
                        </tr>
                        <tr>
                            <td class="tablestyle">Shipping Method: </td>
                            <td class="tablestyle"><?php echo $rows['shipping'] ?></td>
                        </tr>
                        <tr>
                            <td class="tablestyle">Address: </td>
                            <td class="tablestyle"><?php echo $rows['address'] ?></td>
                        </tr>
                        <tr>
                            <td class="tablestyle">Postal Code: </td>
                            <td class="tablestyle"><?php echo $rows['zipCode'] ?></td>
                        </tr>
                        <tr>
                            <td class="tablestyle">City: </td>
                            <td class="tablestyle"><?php echo $rows['city'] ?></td>
                        </tr>
                        <tr>
                            <td class="tablestyle">State: </td>
                            <td class="tablestyle"><?php echo $rows['state'] ?></td>
                        </tr>
                        <tr>
                            <td class="tablestyle">Country: </td>
                            <td class="tablestyle"><?php echo $rows['country'] ?></td>
                        </tr>
                    </table>

                </div>  

                <div>
                    <h4>Are you sure to cancel?<h4>
                    <input type="submit" value="Yes" name="confirm_Y" />
                    <input type="submit" value="No" name="confirm_N" /> 
                </div>
            </form>
        </div>
        
        <?php
                    }
                }
                else{
                    echo "<script type=text/javascript>document.getElementById('searchalert').innerHTML ='Order does not exist, please check the information.'</script>";  
                }
            }

        ?>  
        
        <?php
        if ( isset($_POST['confirm_Y']) ) {
            $sql = "DELETE FROM sales WHERE orderNumber=:orderNumber AND Name=:Name";
            $stmt = $link->prepare($sql);
            $stmt->execute(array(':orderNumber' =>$_POST['orderNumber'],':Name'=>$_POST['Name']));
            echo "<script type=text/javascript>document.getElementById('finalstatus').innerHTML ='Order has been cancelled successfully.'</script>";  
        }
        ?>
        
        <?php include "footer.html"; ?> 
    </body>
</html>