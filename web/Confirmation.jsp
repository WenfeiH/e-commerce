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
        
        <table>
            
        <%
            
            while (result.next()){
                
        %>

                <tr>
                    <td>Product Name: </td>
                    <td><%=result.getString("productName")%>
                </tr>
                <tr>
                    <td>Quantity: </td>
                    <td><%=result.getString("quantity")%>
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
        
        <table>
            <tr>
                <td>Order Number </td>
                <td><%=result.getString("orderNumber")%></td>
            </tr>
            <tr>
                <td>Name: </td>
                <td><%=result.getString("name")%></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><%=result.getString("email")%></td>
            </tr>
            <tr>
                <td>Phone Number: </td>
                <td><%=result.getString("phoneNumber")%></td>
            </tr>
            <tr>
                <td>Shipping Method: </td>
                <td><%=result.getString("shipping")%></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><%=result.getString("address")%></td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td><%=result.getString("zipCode")%></td>
            </tr>
            <tr>
                <td>City: </td>
                <td><%=result.getString("city")%></td>
            </tr>
            <tr>
                <td>State: </td>
                <td><%=result.getString("state")%></td>
            </tr>
            <tr>
                <td>Country: </td>
                <td><%=result.getString("country")%></td>
            </tr>
            <tr>
                <td>Card Type: </td>
                <td><%=result.getString("cardType")%></td>
            </tr>
            <tr>
                <td>Card Number: </td>
                <td><%=result.getString("cardNumber")%></td>
            </tr>
            <tr>
                <td>Security Code: </td>
                <td><%=result.getString("securityCode")%></td>
            </tr>
            <tr>
                <td>Name on Card: </td>
                <td><%=result.getString("nameOnCard")%></td>
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
