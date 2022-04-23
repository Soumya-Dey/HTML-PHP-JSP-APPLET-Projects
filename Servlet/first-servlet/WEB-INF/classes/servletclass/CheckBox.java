package servletclass;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

// Extend HttpServlet class
public class CheckBox extends HttpServlet {

        private int hitCount;

        public void init() {
                // Reset hit counter.
                hitCount = 0;
        }

        // Method to handle GET method request.
        @Override
        public void doGet(HttpServletRequest request,
                        HttpServletResponse response)
                        throws ServletException, IOException {
                // Set response content type
                response.setContentType("text/html");
                hitCount++;
                PrintWriter out = response.getWriter();
                String title = "Reading Checkbox Data";
                String docType = "<!doctype html public \"-//w3c//dtd html 4.0 " +
                                "transitional//en\">\n";
                out.println(docType +
                                "<html>\n" +
                                "<head><title>" + title + "</title></head>\n" +
                                "<body bgcolor=\"#f0f0f0\">\n" +
                                "<h1 align=\"center\">" + title + "</h1>\n" +
                                "<ul>\n" +
                                " <li><b>Maths Flag : </b>: "
                                + request.getParameter("maths") + "\n" +
                                " <li><b>Physics Flag: </b>: "
                                + request.getParameter("physics") + "\n" +
                                " <li><b>Chemistry Flag: </b>: "
                                + request.getParameter("chemistry") + "\n" +
                                "</ul>\n" +
                                "<h1 align=\"center\">Hit Count = " + hitCount + "</h1>\n" +
                                "</body></html>");
        }

        // Method to handle POST method request.
        @Override
        public void doPost(HttpServletRequest request,
                        HttpServletResponse response)
                        throws ServletException, IOException {
                doGet(request, response);
        }
}