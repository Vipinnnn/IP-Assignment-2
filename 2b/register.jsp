<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<body>
 <div align="center">
    <form action="process.jsp">  
        <input style="margin: 10px;" type="text" name="uname" value="Name..." onclick="this.value=''"/>
        <input style="margin: 10px;" type="text" name="uemail"  value="Email ID..." onclick="this.value=''"/>
        <input style="margin: 10px;" type="password" name="upass"  value="Password..." onclick="this.value=''"/>
        <input style="margin: 10px;" type="submit" value="register"/>  
    </form>  
 </div>
</body>
</html>