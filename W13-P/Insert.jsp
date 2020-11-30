<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page language="java" import="java.sql.SQLException" %>
<%@ page language="java" import="java.sql.PreparedStatement" %>
<%@ page language="java" import="java.sql.Connection" %>
<%@ page language="java" import="kr.ac.sungshin.w13.DBConnection" %>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Insert Employee</title>
</head>
<body>
<%
	request.setCharacterEncoding("UTF-8");
	String employee_id = request.getParameter("employee_id");
	String first_name = request.getParameter("first_name");
	String last_name = request.getParameter("last_name");
	String email = request.getParameter("email");
	String phone_number = request.getParameter("phone_number");	
	String salary = request.getParameter("salary");		

	Connection conn = null;	
	PreparedStatement pstmt = null;	
	
	String sql = "insert into employees values (?, ?, ?, ?, ?, TO_DATE(SYSDATE, 'dd-MM-yyyy'), 'AC_ACCOUNT', ?, NULL, 101, 110)";	
	
	int n = 0;
	
	try {
		conn = DBConnection.getConnection();		
		
		pstmt = conn.prepareStatement(sql);	
		pstmt.setString(1, employee_id);
		pstmt.setString(2, first_name);
		pstmt.setString(3, last_name);
		pstmt.setString(4, email);
		pstmt.setString(5, phone_number);
		pstmt.setString(6, salary);
		
		n = pstmt.executeUpdate();		

	} catch (SQLException e){
		System.out.println(e.getMessage());		
	} finally {		
		if(pstmt != null) pstmt.close();
		if(conn != null) conn.close();
	}
	
%>

<script type="text/javascript">
	if(<%=n%> > 0){
		alert("정상적으로 입력되었습니다.");
		location.href="../index.html";
	}else{
		alert("입력이 실패했습니다.");	
		history.go(-1);
	}

</script>

</body>
</html>

	
