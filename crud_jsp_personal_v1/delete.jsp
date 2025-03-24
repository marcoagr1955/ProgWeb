<%@ page contentType="text/html; charset=UTF-8" %>
<%@ page import="java.sql.*" %>
<%@ include file="conexion.jsp" %>

<%
    String mensaje = ""; // Inicialización del mensaje

    // Verificar si se recibió una solicitud POST con CURP
    if ("POST".equalsIgnoreCase(request.getMethod()) && request.getParameter("curp") != null) {
        String curp = request.getParameter("curp");
        PreparedStatement stmt = null;

        try {
            String sql = "DELETE FROM personal WHERE curp = ?";
            stmt = conn.prepareStatement(sql);
            stmt.setString(1, curp);

            int filasAfectadas = stmt.executeUpdate();

            if (filasAfectadas > 0) {
                mensaje = "Baja exitosa.";
            } else {
                mensaje = "No se efectuó la baja, posiblemente el CURP no existe.";
            }
        } catch (Exception e) {
            mensaje = "Error al intentar eliminar el registro: " + e.getMessage();
        } finally {
            if (stmt != null) stmt.close();
        }
    }
%>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
        <h2><%= mensaje %></h2>
        <a href="index.jsp" class="btn btn-primary mt-3">Regresar a inicio</a>
    </div>
</body>
</html>
