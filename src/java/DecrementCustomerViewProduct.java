

import java.io.IOException;
import java.io.PrintWriter;
import java.util.HashMap;
import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(urlPatterns = {"/DecrementCustomerViewProduct"})
public class DecrementCustomerViewProduct extends HttpServlet {
    
        private synchronized void decrementViews(String productName){  
            
        ServletContext servletContext = getServletContext(); 
        
        HashMap<String, Integer> customerViewInfoMap = (HashMap<String, Integer>) servletContext.getAttribute("CustomerViewInfo");
        
        if (customerViewInfoMap == null)
            customerViewInfoMap = new HashMap<String, Integer>(); 
        
        if (customerViewInfoMap.containsKey(productName))
            customerViewInfoMap.put(productName, customerViewInfoMap.get(productName) - 1); 
        else
            customerViewInfoMap.put(productName, 0); 
        
        if (customerViewInfoMap.get(productName) <= 0)
            customerViewInfoMap.remove(productName); 
        
        servletContext.setAttribute("CustomerViewInfo", customerViewInfoMap); 
        
    }

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        String productName = request.getParameter("productName"); 
        decrementViews(productName); 
        
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }

}
