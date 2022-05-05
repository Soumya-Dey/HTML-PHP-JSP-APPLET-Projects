<html>
<body>
<form method="post">
Enter the email
<br>
<input type="text" name="email1" id="email1">
<br>
<br>

Enter the name
<br>
<input type="text" name="name1" id="name1">
<br>
<br>

Choose the operation
<br>
<select name="opration" id="opration">
	<option value="insert">Insert</option>
	<option value="update">Update</option>
	<option value="remove">Remove</option>
</select>
<br>
<br>

<input type="submit">
</form>
<%@ page import ="java.sql.*" %>
<%@ page import ="javax.sql.*" %>
<%! 
Connection conn = null;
PreparedStatement pstmt = null;
%>
<% 
String name = request.getParameter("name1");
String email = request.getParameter("email1");
String operation = request.getParameter("opration");

if(name != null && email != null){
	Class.forName("com.mysql.jdbc.Driver").newInstance();

	conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/test","root", "");
	
	if(operation.equals("insert")){
		pstmt = conn.prepareStatement("insert into users values(?, ?)");
		pstmt.setString(1, name);
		pstmt.setString(2, email);
		pstmt.executeUpdate();

		out.println("Record inserted successfully");
	} else if(operation.equals("update")){
		pstmt = conn.prepareStatement("update users set Name = ? where Email = ?");
		pstmt.setString(1, name);
		pstmt.setString(2, email);
		pstmt.executeUpdate();

		out.println("Record updated successfully");
	} else if(operation.equals("remove")){
		pstmt = conn.prepareStatement("delete from users where Email = ?");
		pstmt.setString(1, email);
		pstmt.executeUpdate();

		out.println("Record deleted successfully");
	} else out.println("No operation selected!");
}
%>
</body>
</html>