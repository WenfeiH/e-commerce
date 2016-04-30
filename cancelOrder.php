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
        <div class="cancel">
            <h4>Cancel an Order</h4>
            <form action="cancelOrder.php" method="post">
                <table>
                    <tr><td>Order Number:</td><td><input type="text" id="orderNumber" size="15"></td></tr>  
                    <tr><td>First Name:</td><td><input type="text" id="firstname2" size="15"></td></tr>  
                    <tr><td>Last Name:</td><td><input type="text" id="lastname2" size="15"></td></tr>  
                    <tr>
                        <td>                    
                            <div>
                                <input type="submit" onclick="return searchcheck()" value="Submit">
                            </div> 
                        </td>
                    </tr> 
                </table>      
                <p class="searchalert" id="searchalert">1111</p>
            </form>
        </div>  
        <?php
            
        ?>
        <div class="recheck">
            <table>        
                <tr>
                    <td class="firstCol tablestyle">Product: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle"></td>
                </tr>          
                <tr>
                    <td class="firstCol tablestyle">Quantity: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">Email: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">Phone Number: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">Shipping Method: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">Address: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">Postal Code: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">City: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">State: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">Country: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
                <tr>
                    <td class="firstCol tablestyle">Card Type: </td>
                    <td class="secondCol"></td>
                    <td class="tablestyle">xxx</td>
                </tr>
            </table>
            <h4>Are you sure to cancel?<h4>
            <div class="btn-group">
                <input type="button" class="btn btn-primary" value="Yes"/>
                <input type="button" class="btn btn-primary" value="No"/> 
            </div>
          
        </div>
        <?php
        ?>
        <?php   
        include "footer.html";
        ?> 
    </body>
</html>