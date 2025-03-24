<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ page import="java.sql.*" %>

<%
    String url = "jdbc:mysql://localhost:3306/progweb";
    String user = "root";
    String password = "aaaaaaaa";
    Connection conn = null;

    try {
        Class.forName("com.mysql.cj.jdbc.Driver");
        conn = DriverManager.getConnection(url, user, password);
        out.println("Conexión exitosa a la base de datos.");
    } catch (Exception e) {
        out.println("Error al conectar: " + e.getMessage());
    }
%>
