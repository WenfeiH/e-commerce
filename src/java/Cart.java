 

import java.io.IOException;
import java.io.PrintWriter;
import java.util.HashMap;
import java.util.Map;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author jiahaochen
 */
@WebServlet(urlPatterns = {"/Cart"})
public class Cart extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Cart</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet Cart at " + request.getContextPath() + "</h1>");
            
            HttpSession session = request.getSession(true);
            Map<String, Integer> shoppingCart = (Map<String, Integer>) session.getAttribute("ShoppingCart");
            if(shoppingCart == null)
                shoppingCart = new HashMap<>();
            out.println("<table>");
            for(Map.Entry<String, Integer> entry : shoppingCart.entrySet())
                out.println("<tr><td> " + entry.getKey() + " </td><td> " + entry.getValue() + "</td></tr>");
            out.println();
            out.println("</body>");
            out.println("</html>");
            out.close();
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
        response.setContentType("text/plain;charset=UTF-8");
        PrintWriter out = response.getWriter();
        
        String productName = request.getParameter("name");
        String num = request.getParameter("quantity");
        int quantity = 0;
        if(num != null)
            quantity = Integer.valueOf(num);
        
        int cartSize = 0;
        HttpSession session = request.getSession(true);
        Map<String, Integer> shoppingCart = (Map<String, Integer>) session.getAttribute("ShoppingCart");
        
        if(shoppingCart == null && productName != null) {
            synchronized(session) {
                shoppingCart = new HashMap<>();
                shoppingCart.put(productName, quantity);
                session.setAttribute("ShoppingCart", shoppingCart);
            }
        } else if(productName != null){
            synchronized(shoppingCart) {
                if(shoppingCart.containsKey(productName))
                    shoppingCart.put(productName, shoppingCart.get(productName) + quantity);
                else
                    shoppingCart.put(productName, quantity);
                
            }
        }
        
        cartSize = getCartSize(shoppingCart);
        out.write("" + cartSize);
        out.close();
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

    private int getCartSize(Map<String, Integer> cart) {
        if(cart == null)
            return 0;
        int cartSize = 0;
        for(Integer q : cart.values())
            cartSize += q;
        return cartSize;
    }
}
