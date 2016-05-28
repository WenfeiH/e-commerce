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
import javax.servlet.annotation.WebServlet;

@WebServlet(urlPatterns = {"/CheckoutPage"})
public class CheckoutPage extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        PrintWriter out = response.getWriter(); 
        response.setContentType("text/html;charset=UTF-8");
        HttpSession session = request.getSession(true);

        HashMap<String, Integer> shoppingCart =(HashMap<String, Integer>) session.getAttribute("ShoppingCart");

        out.println("<head>");
        out.println("<title>Pokemon Fans | Products</title>"); 
        out.println("<link href=\"css/list.css\" rel=\"stylesheet\" />"); 
        out.println("<link href=\"css/common.css\" rel=\"stylesheet\" />"); 
        out.println("<link href=\"css/DetailedStyle.css\" rel=\"stylesheet\">");
        out.println("<script type=\"text/javascript\" src=\"js/CheckoutPage.js\"></script>"); 
        out.println("<script type=\"text/javascript\" src=\"js/check.js\"></script>"); 
        out.println("</head>"); 
        out.println("<body>"); 

        request.getRequestDispatcher("/html/header.html").include(request, response);

        out.println("<h1 align=\"center\">Checkout Page</h1>"); 

        if (shoppingCart != null){

            out.println("<table>"); 

            for (String product : shoppingCart.keySet()){

                String dir = Utils.parseName(product);
                String imageSource = "Images/" + dir + "/" + dir; 
                String ref = "/Project3/DetailPage?name=" + product;

                out.println("<tr>"); 
                out.println("<td><a href=\"" + ref + "\"><img class=\"thumbnail1\" src=\"" + imageSource + ".jpg\"></a></td>");
                out.println("<td><input id=\"" + product + " Input ID" + "\" type=\"number\" value=\"" + shoppingCart.get(product) + "\" min=\"1\"></td>");
                out.println("<td><button type=\"button\" onClick=\"updateCart('" + product + "', document.getElementById('" + product + " Input ID').value);\">Update</button></td>"); 
                out.println("<td><button type=\"button\" onClick=\"removeItem('" + product + "')\">Remove</button></td>"); 
                out.println("</tr>"); 

            }

            out.println("</table>"); 

        }

        out.println("<div class=\"payment\">\n" +
"            <form action=\"\" onSubmit=\"return check()\" method=\"post\">\n" +
"                <fieldset id=\"payment\">\n" +
"                    <legend><h4>Payment Information</h4></legend>\n" +
"                    <table>\n" +
"                        <td class=\"columns3\">\n" +
"                            <table>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Name:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"firstname\" name=\"firstName\" type=\"text\" placeholder=\"First\" class=\"textbox\" />\n" +
"                                        <p id=\"firstnamealert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\"></td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"lastname\" name=\"lastName\" type=\"text\" placeholder=\"Last\" class=\"textbox\" />\n" +
"                                        <p id=\"lastnamealert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Email:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"email\" name=\"email\" type=\"email\" placeholder=\"example@domain.com\" class=\"textbox\" />\n" +
"                                        <p id=\"emailalert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Phone:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"phone\" name=\"phoneNumber\" type=\"tel\" placeholder=\"(949)888-8888\" class=\"textbox\" />\n" +
"                                        <p id=\"phonealert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>  \n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Shipping:</td>\n" +
"                                    <td class=\"ExtraInfo2\">\n" +
"                                        <select id=\"shipping\" name=\"shippingMethod\" class=\"textbox\" required />\n" +
"                                            <option value=\"\"></option>\n" +
"                                            <option value=\"Overnight\">Overnight</option>\n" +
"                                            <option value=\"2-Days Expedited\">2-Days Expedited</option>\n" +
"                                            <option value=\"6-Days Ground\">6-Days Ground</option>\n" +
"                                            <option value=\"Express\">Express</option>\n" +
"                                            <option value=\"Free\">Free</option>\n" +
"                                        </select>\n" +
"                                        <p id=\"shippingalert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                            </table>\n" +
"                        </td>\n" +
"                        <td class=\"columns3\">\n" +
"                            <table>                   \n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Address:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"lin1\" name=\"address1\" type=\"text\" placeholder=\"Line 1\" class=\"textbox\" />\n" +
"                                        <p id=\"lin1alert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\"></td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"lin2\" name=\"address2\" type=\"text\" placeholder=\"Line 2\" class=\"textbox\" /></td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Post Code:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"postal\" name=\"postalCode\" type=\"text\" class=\"textbox\" />\n" +
"                                        <p id=\"postalalert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">City:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"city\" name=\"city\" type=\"text\" class=\"textbox\" />\n" +
"                                        <p id=\"cityalert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr> \n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">State:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"state\" name=\"state\" type=\"text\" class=\"textbox\" />\n" +
"                                        <p id=\"statealert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>                               \n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Country:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"country\" name=\"country\" type=\"text\" class=\"textbox\" />\n" +
"                                        <p id=\"countryalert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>                                \n" +
"                            </table>  \n" +
"                        </td>\n" +
"                        <td class=\"columns3\">\n" +
"                            <table>	\n" +
"                                <tr height=20px></tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Card Type:</td>\n" +
"                                    <td class=\"ExtraInfo2\">\n" +
"                                        <form id=\"cardtype\">                                						\n" +
"                                            <input type=\"radio\" name=\"card\" id=\"Visa\" value=\"Visa\" checked /> \n" +
"                                            <label for=\"Visa\">Visa</label><br>\n" +
"                                            <input type=\"radio\" name=\"card\" id=\"American Express\" value=\"American Express\" />\n" +
"                                            <label for=\"American Express\">American Express</label><br>\n" +
"                                            <input type=\"radio\" name=\"card\" id=\"Mastercard\" value=\"Mastercard\" />\n" +
"                                            <label for=\"Mastercard\">Mastercard</label><br>\n" +
"                                        </form>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Card Number:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"cardnum\" name=\"cardNumber\" type=\"text\" maxlength=\"16\" class=\"textbox\" />\n" +
"                                        <p id=\"cardnumalert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Security Code:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"secure\" name=\"securityCode\" type=\"text\" class=\"textbox\" />\n" +
"                                        <p id=\"securealert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>\n" +
"                                <tr>\n" +
"                                    <td class=\"ExtraInfo1\">Name on Card:</td>\n" +
"                                    <td class=\"ExtraInfo2\"><input id=\"holder\" name=\"nameOnCard\" type=\"text\" class=\"textbox\" />\n" +
"                                        <p id=\"holderalert\" class=\"alert\"/></p>\n" +
"                                    </td>\n" +
"                                </tr>                                \n" +
"                            </table>  \n" +
"                        </td>\n" +
"                    </table>   \n" +
"                        \n" +
"                    <div class=\"submit\">\n" +
"                        <input type=\"submit\" name=\"submit\" value=\"Submit your Order\"/>\n" +
"                    </div>  \n" +
"\n" +
"                </fieldset>\n" +
"            </form>\n" +
"        </div>   "); 

        request.getRequestDispatcher("/html/footer.html").include(request, response);

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
