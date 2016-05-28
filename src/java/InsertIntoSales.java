/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.sql.PreparedStatement; 
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.RequestDispatcher; 
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpSession;
import java.util.HashMap; 

@WebServlet(urlPatterns = {"/InsertIntoSales"})
public class InsertIntoSales extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter(); 
        
        String firstName =  request.getParameter("firstName"); 
        String lastName = request.getParameter("lastName"); 
        String email = request.getParameter("email"); 
        String phoneNumber = request.getParameter("phoneNumber"); 
        String shippingMethod = request.getParameter("shippingMethod"); 
        String addressLine1 = request.getParameter("address1"); 
        String addressLine2 = request.getParameter("address2"); 
        String postCode = request.getParameter("postalCode");
        String city = request.getParameter("city"); 
        String state = request.getParameter("state"); 
        String country = request.getParameter("country"); 
        String cardType = request.getParameter("card"); 
        String cardNumber = request.getParameter("cardNumber"); 
        String securityCode = request.getParameter("securityCode"); 
        String nameOnCard = request.getParameter("nameOnCard"); 
        
        Connection con = null; 
        PreparedStatement insertSaleStatement = null; 
        Statement statement = null; 
        ResultSet generatedKey = null; 
        
        try {
            
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection(DatabaseLoginInformation.LOGINURL, DatabaseLoginInformation.USERNAME, DatabaseLoginInformation.USERPASSWORD);
            
            String insertSaleCommand = "INSERT INTO sales (name, email, phoneNumber, "
                    + "shipping, address, zipCode, city, state, country, cardType, cardNumber, securityCode, nameOnCard) VALUES (?, ?, ?, ?, "
                    + "?, ?, ?, ?, ?, ?, ?, ?, ?); "; 
            
            insertSaleStatement = con.prepareStatement(insertSaleCommand, Statement.RETURN_GENERATED_KEYS);
            insertSaleStatement.setString(1, firstName + " " + lastName); 
            insertSaleStatement.setString(2, email); 
            insertSaleStatement.setString(3, phoneNumber); 
            insertSaleStatement.setString(4, shippingMethod); 
            if (addressLine2 == null || addressLine2.equals(""))
                insertSaleStatement.setString(5, addressLine1); 
            else
                insertSaleStatement.setString(5, addressLine1 + " " + addressLine2); 
            insertSaleStatement.setInt(6, Integer.parseInt(postCode)); 
            insertSaleStatement.setString(7, city); 
            insertSaleStatement.setString(8, state); 
            insertSaleStatement.setString(9, country); 
            insertSaleStatement.setString(10, cardType); 
            insertSaleStatement.setString(11, cardNumber); 
            insertSaleStatement.setString(12, securityCode); 
            insertSaleStatement.setString(13, nameOnCard); 
            
            insertSaleStatement.executeUpdate(); 
            generatedKey = insertSaleStatement.getGeneratedKeys(); 
            generatedKey.next(); 
            int orderNumber = generatedKey.getInt(1); 
            
            generatedKey.close(); 
            insertSaleStatement.close(); 
            
            HttpSession session = request.getSession(true);
            HashMap<String, Integer> shoppingCart = (HashMap<String, Integer>) session.getAttribute("ShoppingCart"); 
            statement = con.createStatement(); 
            
            for (String productName : shoppingCart.keySet()){
                
                String insertProductOfSales = "INSERT INTO products_of_sales (productName, quantity, sales_id) VALUES (\"" + productName + "\", " + shoppingCart.get(productName) + ", " + orderNumber + "); "; 
                statement.executeUpdate(insertProductOfSales); 
                
            }
            
            statement.close(); 
            con.close(); 
            out.close(); 
            
            session.setAttribute("ShoppingCart", null);
            
            response.sendRedirect("/Project3/Confirmation.jsp"); 
            
        }
        
        catch (Exception e){
            
            out.println("<HTML>" +
		"<HEAD><TITLE>" +
		"Product: Error" +
		"</TITLE></HEAD>\n<BODY>" +
		"<P>Error in doGet: " +
		e.getMessage() + "</P></BODY></HTML>");
            
        }
        
        finally {
            
            if (out != null)
                out.close(); 
            try { insertSaleStatement.close(); } catch (Exception e) {}
            try { statement.close(); } catch (Exception e) {}
            try { con.close(); } catch (Exception e) {}
            
        }
        
        
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
