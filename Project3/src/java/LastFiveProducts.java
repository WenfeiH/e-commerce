import java.io.IOException;
import java.io.PrintWriter;
import java.sql.DriverManager;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.util.ArrayList; 
import java.sql.*; 

@WebServlet(urlPatterns = {"/LastFiveProducts"})
public class LastFiveProducts extends HttpServlet {
    
    private String parseName(String name){

        String[] nameParsed = name.split(" "); 
        if (nameParsed.length == 2)
            return nameParsed[0] + "_" + nameParsed[1]; 
        else
            return nameParsed[0] + "_" + nameParsed[1] + "_" + nameParsed[2]; 

    }

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter(); 
        HttpSession session = request.getSession();
        
        ArrayList<String> lastFiveProducts; 
        
        if (session.getAttribute("LastFiveProducts") == null)
            lastFiveProducts = new ArrayList<String>(); 
        else
            lastFiveProducts = (ArrayList<String>) session.getAttribute("LastFiveProducts"); 
        
        out.println("<br />"); 
        out.println("\t\t<h1 align=\"center\">Last Five Products Visited</h3>"); 
        out.println("\t\t\t<div class=\"list\">"); 
        out.println("\t\t\t<table>"); 
        out.println("\t\t\t\t<tr>");
        
        Connection con = null; 
        Statement statement = null; 
        ResultSet result = null; 
        
//        lastFiveProducts.add("Pokemon Blue"); 
//        lastFiveProducts.add("Pokemon Black"); 
//        lastFiveProducts.add("Pokemon Crystal"); 
//        lastFiveProducts.add("Pokemon Ruby"); 
//        lastFiveProducts.add("Pokemon Y"); 
        
        try {

            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection(DatabaseLoginInformation.LOGINURL, DatabaseLoginInformation.USERNAME, DatabaseLoginInformation.USERPASSWORD);
            statement = con.createStatement(); 
            
            String productQuery; 
            String dir; 
            String ref; 
            String imageSource; 
            
            for (int i = 0; i < lastFiveProducts.size(); i++){
                
                productQuery = "SELECT * FROM products WHERE name = \"" + lastFiveProducts.get(i) + "\"; "; 
                result = statement.executeQuery(productQuery); 
                result.next(); 
                
                dir = parseName(result.getString("name")); 
                ref = ""; 
                imageSource = "Images/" + dir + "/" + dir; 
                
                out.println("\t\t\t\t\t<td>"); 
                out.println("\t\t\t\t\t\t<div class=\"pic_cell\">"); 
                out.println("\t\t\t\t\t\t\t<a href=\"" + ref + "\"><img alt=" + lastFiveProducts.get(i) + " Image Is Not Available\" src=\"" + imageSource + ".jpg\"></a>"); 
                out.println("\t\t\t\t\t\t\t<div class=\"container\">"); 
                out.println("\t\t\t\t\t\t\t\t<p class=\"name\">" + result.getString("name") + "</p>");
                out.println("\t\t\t\t\t\t\t\t<p class=\"rd\">Release Date: " + result.getInt("releaseDate") + "</p>");
                out.println("\t\t\t\t\t\t\t\t<p class=\"gen\">Generation: " + result.getInt("generation") + "</p>"); 
                out.println("\t\t\t\t\t\t\t</div>"); 
                out.println("\t\t\t\t\t\t</div>"); 
                out.println("\t\t\t\t\t</td>"); 
                
                result.close(); 

            }
            
            out.println("\t\t\t\t</tr>"); 
            out.println("\t\t\t</table>"); 
            out.println("\t\t</div>");
            
            statement.close(); 
            con.close(); 
            
        }
        
        catch (SQLException e){
            
            out.println("<HTML>" +
		"<HEAD><TITLE>" +
		"Product: Error" +
		"</TITLE></HEAD>\n<BODY>" +
		"<P>SQL error: " +
		e.getMessage() + "</P></BODY></HTML>");
            
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
            
            try { result.close(); } catch (Exception e) {}
            try { statement.close(); } catch (Exception e) {}
            try { con.close(); } catch (Exception e) {}
            
        }
        
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
