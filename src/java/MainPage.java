

import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.*; 
import java.sql.*; 

@WebServlet(urlPatterns = {"/MainPage"})
public class MainPage extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException{
        
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter(); 
        
        Connection con = null; 
        Statement statement = null; 
        ResultSet result = null; 
        
        try {
            
            out.println("\t<head>");
            out.println("\t\t<title>Pokemon Fans | Products</title>"); 
            out.println("\t\t<link href=\"css/list.css\" rel=\"stylesheet\" />"); 
            out.println("\t\t<link href=\"css/common.css\" rel=\"stylesheet\" />"); 
            out.println("\t\t<link href=\"css/DetailedStyle.css\" rel=\"stylesheet\">");
            out.println("\t</head>"); 
            out.println("\t<body>"); 
            
            request.getRequestDispatcher("/html/header.html").include(request, response);
            
            out.println("\t\t<div class=\"list\">"); 
            out.println("\t\t\t<table>"); 
            out.println("\t\t\t\t<tr>"); 
            
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection(DatabaseLoginInformation.LOGINURL, DatabaseLoginInformation.USERNAME, DatabaseLoginInformation.USERPASSWORD);
            statement = con.createStatement(); 
            String getAllMovies = "SELECT * FROM products; "; 
            result = statement.executeQuery(getAllMovies); 
            
            int count = 0; 
            
            while (result.next()){
                
                if (count %4 == 0){
                    
                    out.println("</tr>"); 
                    out.println("<tr>"); 
                    
                }
                String productName = result.getString("name");
                String dir = Utils.parseName(productName); 
                String ref = "/Project3/DetailPage?name=" + productName; 
                String imageSource = "Images/" + dir + "/" + dir; 
                
                out.println("\t\t\t\t\t<td>"); 
                out.println("\t\t\t\t\t\t<div class=\"pic_cell\">"); 
                out.println("\t\t\t\t\t\t\t<a href=\"" + ref + "\"><img alt=\"" + productName + " Image Is Not Available\" src=\"" + imageSource + ".jpg\"></a>"); 
                out.println("\t\t\t\t\t\t\t<div class=\"container\">"); 
                out.println("\t\t\t\t\t\t\t\t<p class=\"name\">" + productName + "</p>"); 
                out.println("\t\t\t\t\t\t\t\t<p class=\"rd\">Release Date: " + result.getInt("releaseDate") + "</p>"); 
                out.println("\t\t\t\t\t\t\t\t<p class=\"gen\">Generation: " + result.getInt("generation") + "</p>"); 
                out.println("\t\t\t\t\t\t\t</div>"); 
                out.println("\t\t\t\t\t\t</div>"); 
                out.println("\t\t\t\t\t</td>"); 
                
                count++; 
                
            }
            
            out.println("\t\t\t\t</tr>"); 
            out.println("\t\t\t</table>"); 
            out.println("\t\t</div>"); 
            
            request.getRequestDispatcher("/LastFiveProducts").include(request, response);
            
            request.getRequestDispatcher("/html/footer.html").include(request, response);

            out.println("\t</body>"); 
            
            out.close(); 
            result.close(); 
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
            
            if (out != null)
		out.close(); 
				
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
        return "Get Information for All Products";
    }// </editor-fold>

}
