import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.ServletContext; 
import java.util.HashMap; 
import javax.servlet.annotation.WebServlet;

@WebServlet(urlPatterns = {"/IncrementCustomerViewProduct"})
public class IncrementCustomerViewProduct extends HttpServlet {
    
    private synchronized int incrementViews(String productName){
        
        ServletContext servletContext = getServletContext(); 
        
        HashMap<String, Integer> customerViewInfoMap = (HashMap<String, Integer>) servletContext.getAttribute("CustomerViewInfo"); ; 
        
        if (customerViewInfoMap == null)
            customerViewInfoMap = new HashMap<String, Integer>(); 
        
        if (customerViewInfoMap.containsKey(productName))
            customerViewInfoMap.put(productName, customerViewInfoMap.get(productName) + 1); 
        else
            customerViewInfoMap.put(productName, 1); 
        
        servletContext.setAttribute("CustomerViewInfo", customerViewInfoMap); 
        
        return customerViewInfoMap.get(productName); 
        
    }

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter(); 
        
        String productName = request.getParameter("productName"); 
        
        int numberOfViews = incrementViews(productName); 
        
        out.println("<h2>Number of Customers Viewing This Product: " + numberOfViews + "</h2>"); 
        
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
