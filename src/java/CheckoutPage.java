/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.util.HashMap;

public class CheckoutPage extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter(); 
        HttpSession session = request.getSession(true);
        
        HashMap<String, Integer> shoppingCart =(HashMap<String, Integer>) session.getAttribute("ShoppingCart");
        
        out.println("<head>");
        out.println("<title>Pokemon Fans | Products</title>"); 
        out.println("<link href=\"css/list.css\" rel=\"stylesheet\" />"); 
        out.println("<link href=\"css/common.css\" rel=\"stylesheet\" />"); 
        out.println("<link href=\"css/DetailedStyle.css\" rel=\"stylesheet\">");
        out.println("</head>"); 
        out.println("<body>"); 
        out.println("<table>"); 
        
        for (String product : shoppingCart.keySet()){
            
            String dir = Utils.parseName(product);
            String imageSource = "Images/" + dir + "/" + dir; 
            String ref = "/Project3/DetailPage?name=" + product;
            
            out.println("<tr>"); 
            out.println("<a href=\"" + ref + "\"><td><img class=\"thumbnail1\" src=\"" + imageSource + ".jpg\"></a></td>");
            out.println("<td><input id=\"" + product + " Input ID" + "\" type=\"number\" value=\"" + shoppingCart.get(product) + "\"></td>");
            out.println("<td><button type=\"button\">Update</button></td>"); 
            out.println("<td><button type=\"button\">Remove</button></td>"); 
            out.println("</tr>"); 
            
        }
        
        out.println("</table>"); 
        out.println("</body>");
        out.close(); 
            
        
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
