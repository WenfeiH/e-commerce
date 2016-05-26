import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*; 
import java.util.Deque;
import java.util.concurrent.ConcurrentLinkedDeque;
import javax.servlet.http.HttpSession;

/**
 *
 * @author jiahaochen
 */
@WebServlet(urlPatterns = {"/DetailPage"})
public class DetailPage extends HttpServlet {

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
        
        String productName = request.getParameter("name");
        PrintWriter out = null;
        Connection con = null; 
        Statement statement = null; 
        ResultSet result = null; 
        
        try {
            out = response.getWriter();
            if(productName == null) {
                printErrorPage(out, null);
                return;
            }
            String dir = Utils.parseName(productName);
            String imageSource = "Images/" + dir + "/" + dir; 
            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Pokemon Fans | " + productName + "</title>");
            out.println("<link href=\"./css/DetailedStyle.css\" rel=\"stylesheet\" />");
            out.println("</head>");
            out.println("<body>");
            request.getRequestDispatcher("/html/header.html").include(request, response);
            
            out.println("<div class=\"details\" >");
            out.println("<table class=\"column\">");
            out.println("<td class=\"left\">");
            out.println("<table class=\"column\">");
            out.println("<tr><img class=\"thumbnail1\" src=\"" + imageSource + ".jpg\"></tr>");
            out.println("<tr>");
            out.println("<td class=\"columns\">");
            out.println("<img class=\"thumbnail1\" src=\"" + imageSource + "_1.jpg\"> ");
            out.println("</td>");
            out.println("<td class=\"columns\">");
            out.println("<img class=\"thumbnail1\" src=\"" + imageSource + "_2.jpg\"> ");
            out.println("</td>");
            out.println("<td class=\"columns\">");
            out.println("<img class=\"thumbnail1\" src=\"" + imageSource + "_3.jpg\"> ");
            out.println("</td>");
            out.println("</tr></table></td>");
            
            
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection(DatabaseLoginInformation.LOGINURL, DatabaseLoginInformation.USERNAME, DatabaseLoginInformation.USERPASSWORD);
            statement = con.createStatement(); 
            String productInfoQuery = "SELECT * FROM products WHERE name = \"" + productName + "\";"; 
            result = statement.executeQuery(productInfoQuery);
            
            if(!result.next()) {
                printErrorPage(out, null);
                return;
            }
            
            out.println("<td class=\"right\">");
            out.println("<h4 id=\"product\">" +productName + "</h4>");
            out.println("<p id=\"price\">Price: " + result.getString("price") + "</p>");
            out.println("<table class=\"description\">");
            out.println("<tr><td class=\"ExtraInfo1\">Platform:</td>");
            out.println("<td class=\"ExtraInfo2\">" + result.getString("platform") + "</td></tr>");
            out.println("<tr><td class=\"ExtraInfo1\">Cover Pokemon:</td>");
            out.println("<td class=\"ExtraInfo2\">" + result.getString("coverPokemon") + "</td></tr>");
            out.println("<tr><td class=\"ExtraInfo1\">IGN Rating:</td>");
            out.println("<td class=\"ExtraInfo2\">" + result.getString("IGNRating") + "</td></tr>");
            out.println("<tr><td class=\"ExtraInfo1\">Copies Sold:</td>");
            out.println("<td class=\"ExtraInfo2\">" + result.getString("copiesSold") + "</td></tr>");
            out.println("<tr><td class=\"ExtraInfo1\">Game Region:</td>");
            out.println("<td class=\"ExtraInfo2\">" + result.getString("gameRegion") + "</td></tr>");
            out.println("<tr><td class=\"ExtraInfo1\">Twin Pair:</td>");
            out.println("<td class=\"ExtraInfo2\">" + result.getString("twinPair") + "</td></tr>");
            out.println("</table>");
            out.println("<div><input id=\"quantity\" type=\"number\" value=\"1\" min=\"1\" size=2/>"); // TODO: Style it.
            out.println("<br><button onclick=\"addToCart('" + productName + "');\">Add to cart</button></br></div>"); // TODO: Style it.
            out.println("</td></table></div>");
            
            
            out.println("</body>");
            out.println("</html>");
        } catch(SQLException e) {
            printErrorPage(out, e);
        } catch(Exception e) {
            printErrorPage(out, e);
        } finally {
            if (out != null)
		out.close(); 		
            try { result.close(); } catch (Exception e) {}
            try { statement.close(); } catch (Exception e) {}
            try { con.close(); } catch (Exception e) {}
        }
        
        HttpSession session = request.getSession(true);
        Deque<String> q;
        synchronized(session) {
            if(session.getAttribute("LastFiveProducts") == null) {
                q = new ConcurrentLinkedDeque<>();
                q.offerFirst(productName);
                session.setAttribute("LastFiveProducts", q);
            } else {
                q = (Deque<String>) session.getAttribute("LastFiveProducts");
                if(q.contains(productName))
                    q.remove(productName);
                else
                    while(q.size() >= 5)
                        q.pollLast();
                q.offerFirst(productName);
            }
        }
    }

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
    }

    private void printErrorPage(PrintWriter out, Exception e) {
        out.println("<HTML>" +
		"<HEAD><TITLE>" +
		"Product: Error" +
		"</TITLE></HEAD>\n<BODY>" +
		"<P>Error in doGet: <br>");
        if(e != null)
            out.println(e.getMessage() + "</P></BODY></HTML>");
        else
            out.println("Sorry! But which product are you looking for?</P></BODY></HTML>");
    }
}
