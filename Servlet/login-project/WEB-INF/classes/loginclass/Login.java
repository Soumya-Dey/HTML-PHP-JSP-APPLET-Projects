package loginclass;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.*;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class Login extends HttpServlet {
    public static String validateAndGetDetails(String email, String pass) {
        Connection conn = null;
        PreparedStatement pst = null;
        ResultSet rs = null;

        String url = "jdbc:mysql://localhost:3306/";
        String dbName = "user_management";
        String driver = "com.mysql.jdbc.Driver";
        String userName = "root";
        String password = "";
        String name = "";

        try {
            Class.forName(driver).newInstance();
            conn = DriverManager
                    .getConnection(url + dbName, userName, password);

            pst = conn
                    .prepareStatement("select * from users where email=? and password=?");
            pst.setString(1, email);
            pst.setString(2, pass);

            rs = pst.executeQuery();

            if (rs.next())
                name = rs.getString("name");
        } catch (Exception e) {
            System.out.println(e);
        } finally {
            try {
                rs.close();
                pst.close();
                conn.close();
            } catch (Exception e) {
                System.out.println(e);
            }
        }

        return name;
    }

    @Override
    public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException {
        res.setContentType("text/html");
        res.setCharacterEncoding("UTF-8");
        PrintWriter out = res.getWriter();

        String email = req.getParameter("email");
        String pass = req.getParameter("pass");
        String userName = validateAndGetDetails(email, pass);

        if (userName != "") {
            out.println("Welcome, " + userName);
            out.println("<br>Email address: " + email);
            out.println("<br><a href='index.html'>Logout</a>");
        } else {
            out.println(userName);
            out.println("Email or Password wrong. Try Again!");
            RequestDispatcher rd = req.getRequestDispatcher("index.html");
            rd.include(req, res);
        }
    }
}
