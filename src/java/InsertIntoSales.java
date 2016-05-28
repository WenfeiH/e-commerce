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

public class InsertIntoSales extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String firstName =  request.getParameter("firstName"); 
        String lastName = request.getParameter("lastName"); 
        String email = request.getParameter("email"); 
        String phoneNumber = request.getParameter("phoneNumber"); 
        String quantity = request.getParameter("quantity"); 
        String shipping = request.getParameter("shipping"); 
        String addressLine1 = request.getParameter("addressLine1"); 
        String addressLine2 = request.getParameter("addressLine2"); 
        String postCode = request.getParameter("postCode");
        String city = request.getParameter("city"); 
        String state = request.getParameter("state"); 
        String country = request.getParameter("country"); 
        String cardType = request.getParameter("cardType"); 
        String cardNumber = request.getParameter("cardNumber"); 
        String securityCode = request.getParameter("securityCode"); 
        String nameOnCard = request.getParameter("nameOnCard"); 
        
        Connection con = null; 
        PreparedStatement statement = null; 
        
        try {
            
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection(DatabaseLoginInformation.LOGINURL, DatabaseLoginInformation.USERNAME, DatabaseLoginInformation.USERPASSWORD);
            
            String insertSaleCommand = "INSERT INTO sales (orderNumber, productName, Name, email, phoneNumber, quantity, "
                    + "shipping, address, zipCode, city, state, country, cardType, cardNumber, securityCode, nameOnCard) VALUES (?, ?, ?, ?, ?, ?, "
                    + "?, ?, ?, ?, ?, ?, ?, ?, ?, ?); "; 
            
            statement = con.prepareStatement(insertSaleCommand);
            statement.setString(3, firstName + " " + lastName); 
            statement.setString(4, email); 
            statement.setString(5, phoneNumber); 
            statement.setInt(6, Integer.parseInt(quantity)); 
            statement.setString(7, shipping); 
            statement.setString(8, addressLine1 + " " + addressLine2); 
            statement.setInt(9, Integer.parseInt(postCode)); 
            statement.setString(10, city); 
            statement.setString(11, state); 
            statement.setString(12, country); 
            statement.setString(13, cardType); 
            statement.setString(14, cardNumber); 
            statement.setString(15, securityCode); 
            statement.setString(16, nameOnCard); 
            
            int status = statement.executeUpdate(); 
            
            statement.close(); 
            con.close(); 
            
        }
        
        catch (Exception e){
            
            
            
        }
        
        finally {
            
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
