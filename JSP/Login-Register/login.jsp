<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
<%@ page import="java.sql.*" %>

<%
Class.forName("com.mysql.jdbc.Driver").newInstance();
Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/user_management", "root", "");

String name = request.getParameter("name");
String email = request.getParameter("email");
String pass = request.getParameter("pass");
String action = request.getParameter("action");

PreparedStatement pstmt = conn.prepareStatement("select * from users where email = ?");
pstmt.setString(1, email);

ResultSet rs = pstmt.executeQuery();
if(action.equals("login") && rs.next() && rs.getString("password").equals(pass)){
    out.println("<h2>Welcome, " + rs.getString("name") + "</h2>");
    out.println("<br><a href='/login-project-jsp-practice'>Logout</a>");
} else if(action.equals("register") && !rs.next()){
    pstmt = conn.prepareStatement("insert into users values(?, ?, ?)");
    pstmt.setString(1, email);
    pstmt.setString(2, pass);
    pstmt.setString(3, name);
    
    if(pstmt.executeUpdate() > 0){
        out.println("<h2>Welcome, " + name + "</h2>");
        out.println("<br><a href='/login-project-jsp-practice'>Logout</a>");
    } else {
        RequestDispatcher rd = request.getRequestDispatcher("index.html");
        rd.include(request, response);
    }
} else {
    RequestDispatcher rd = request.getRequestDispatcher("index.html");
    rd.include(request, response);
}
%>
</body>

</html>