package loginclass;

import java.io.*;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class Login extends HttpServlet{
	@Override
	public void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException{
		try{
			res.setContentType("text/html");
			res.setCharacterEncoding("utf-8");
			PrintWriter out = res.getWriter();

			Class.forName("com.mysql.jdbc.Driver").newInstance();
			Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/user_management", "root", "");

			String name = req.getParameter("name");
			String email = req.getParameter("email");
			String pass = req.getParameter("pass");
			String action = req.getParameter("action");

			PreparedStatement pstmt = conn.prepareStatement("select * from users where email = ?");
			pstmt.setString(1, email);
			ResultSet rs = pstmt.executeQuery();

			if(action.equals("login") && rs.next() && rs.getString("password").equals(pass)){
				out.println("<h2>Welcome, " + rs.getString("name") + "</h2>");
				out.println("<a href='/login-project-servlet-practice'>Logout</a>");
			} else if(action.equals("register") && !rs.next()){
				pstmt = conn.prepareStatement("insert into users values(?, ?, ?)");
				pstmt.setString(1, email);
				pstmt.setString(2, pass);
				pstmt.setString(3, name);

				if(pstmt.executeUpdate() > 0){
					out.println("<h2>Welcome, " + name + "</h2>");
					out.println("<a href='/login-project-servlet-practice'>Logout</a>");
				} else {
					RequestDispatcher rd = req.getRequestDispatcher("index.html");
					rd.include(req, res);
				}
			} else {
				RequestDispatcher rd = req.getRequestDispatcher("index.html");
				rd.include(req, res);
			}
		}catch(Exception e){
			System.out.println(e);
		}
	}

	@Override
	public void doGet(HttpServletRequest req, HttpServletResponse res){
		try{
			doPost(req, res);
		} catch(Exception e){
			System.out.println(e);
		}
	}
}