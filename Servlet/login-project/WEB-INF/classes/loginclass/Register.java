package loginclass;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.*;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class Register extends HttpServlet {
    public static int insertRecord(String name, String email, String pass) {
        Connection conn = null;
        PreparedStatement pst = null;
        ResultSet rs = null;

        String url = "jdbc:mysql://localhost:3306/";
        String dbName = "user_management";
        String driver = "com.mysql.jdbc.Driver";
        String userName = "root";
        String password = "";
        int status = -1;

        try {
            Class.forName(driver).newInstance();
            conn = DriverManager
                    .getConnection(url + dbName, userName, password);

            pst = conn.prepareStatement("select * from users where email=?");
            pst.setString(1, email);
            rs = pst.executeQuery();

            if (rs.next())
                return -1;

            pst = conn.prepareStatement("insert into users values(?, ?, ?)");
            pst.setString(1, email);
            pst.setString(2, pass);
            pst.setString(3, name);
            status = pst.executeUpdate();
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

        return status;
    }

    @Override
    public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException {
        res.setContentType("text/html");
        res.setCharacterEncoding("UTF-8");
        PrintWriter out = res.getWriter();

        String name = req.getParameter("name");
        String email = req.getParameter("email");
        String pass1 = req.getParameter("pass1");
        String pass2 = req.getParameter("pass2");

        if (!pass1.equals(pass2)) {
            out.println("Passwords don't match. Try Again!");
            RequestDispatcher rd = req.getRequestDispatcher("register.html");
            rd.include(req, res);
        } else if (insertRecord(name, email, pass1) < 0) {
            out.println("An account already exists with this email. Please Login!");
            RequestDispatcher rd = req.getRequestDispatcher("register.html");
            rd.include(req, res);
        } else {
            out.println("Please login now.");
            RequestDispatcher rd = req.getRequestDispatcher("index.html");
            rd.include(req, res);
        }
    }
}
