<%@page import="java.sql.*,
 javax.sql.*,
 java.io.IOException,
 javax.servlet.http.*,
 javax.servlet.*"
%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/list.css" rel="stylesheet" />
        <link href="css/common.css" rel="stylesheet" />
        <link href="css/DetailedStyle.css" rel="stylesheet">
        <link href="css/InsertIntoSales.css" rel="stylesheet">
        <title>Confirmation Page</title>
    </head>
    <body>
        
        <div class="header">      
            <a href="/Project3" class="logo">POKEMON FANS</a>
            <ul class="nav">
                <li class="nav-item"><a href="/Project3">Home</a></li>
                <li class="nav-item"><a href="MainPage">Products</a></li>
                <li class="nav-item"><a href="Cart" id="cart">Cart</a></li>
            </ul>
        </div>  

        <%
            Connection con = null; 
            Statement statement = null; 
            ResultSet result = null; 
            
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection("jdbc:mysql://sylvester-mccoy-v3.ics.uci.edu/inf124grp22", "inf124grp22", "4Rupraw&");
            statement = con.createStatement(); 
            
            String getProductDetails = "SELECT * FROM products_of_sales WHERE sales_id = " + request.getParameter("orderNumber");  
            result = statement.executeQuery(getProductDetails); 
        
        %>
        
        <table class="salesTable">
            
            <tr>
                <td class="listOfProductDataColumn">Product Name</td>
                <td class="listOfProductDataColumn">Quantity</td>
            </tr>
            
        <%
            
            while (result.next()){
            
        %>

                <tr>
                    <td class="listOfProductData"><%=result.getString("productName")%></td>
                    <td class="listOfProductData"><%=result.getString("quantity")%></td>
                </tr>
        
        <%        
            }
        %>
            
        </table>

        <%
            
            result.close(); 
            
            String getOrderDetails = "SELECT * FROM sales WHERE orderNumber = " + request.getParameter("orderNumber"); 
            
            result = statement.executeQuery(getOrderDetails); 
            result.next(); 
            
        %>
        
        <table class="salesTable">
            <tr>
                <td class="salesDataColumn">Order Number </td>
                <td class="salesData"><%=result.getString("orderNumber")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Name: </td>
                <td class="salesData"><%=result.getString("name")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Email: </td>
                <td class="salesData"><%=result.getString("email")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Phone Number: </td>
                <td class="salesData"><%=result.getString("phoneNumber")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Shipping Method: </td>
                <td class="salesData"><%=result.getString("shipping")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Address: </td>
                <td class="salesData"><%=result.getString("address")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Zip Code: </td>
                <td class="salesData"><%=result.getString("zipCode")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">City: </td>
                <td class="salesData"><%=result.getString("city")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">State: </td>
                <td class="salesData"><%=result.getString("state")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Country: </td>
                <td class="salesData"><%=result.getString("country")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Card Type: </td>
                <td class="salesData"><%=result.getString("cardType")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Card Number: </td>
                <td class="salesData"><%=result.getString("cardNumber")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Security Code: </td>
                <td class="salesData"><%=result.getString("securityCode")%></td>
            </tr>
            <tr>
                <td class="salesDataColumn">Name on Card: </td>
                <td class="salesData"><%=result.getString("nameOnCard")%></td>
            </tr>
        </table>
        
        <%
            result.close(); 
            statement.close(); 
            con.close(); 
        %>
        
        <div class="footer">
            <p>University of California, Irvine, CA 92676</p>          
            <p>&copy; 2016 Pokemon Fans.  All rights reserved.</p>
        </div> 
        
    </body>
</html>
