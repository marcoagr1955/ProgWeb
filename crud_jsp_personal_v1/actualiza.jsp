<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ page import="java.sql.*" %>
<%@ include file="conexion.jsp" %>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/stylesalta_act.css">
</head>
<body>
    <header class="encabezado">
        <h1>Actualizar Registro</h1>
        
    </header>
           <a href="index.jsp">Regresar a inicio</a>
    <section class="contenido">
        <div class="table-container">
            <%
                if (request.getMethod().equalsIgnoreCase("POST")) {
                    String id = request.getParameter("id");
                    String curp = request.getParameter("curp");
                    String nombre = request.getParameter("nombre");
                    String apellidos = request.getParameter("apellidos");
                    String domicilio = request.getParameter("domicilio");
                    String colonia = request.getParameter("colonia");
                    String codigo_postal = request.getParameter("codigo_postal");
                    String telefono = request.getParameter("telefono");
                    String email = request.getParameter("email");
                    String fecha_nacimiento = request.getParameter("fecha_nacimiento");
                    String estatura = request.getParameter("estatura");
                    String peso = request.getParameter("peso");

                    PreparedStatement stmt = null;

                    try {
                        String sql = "UPDATE personal SET curp=?, nombre=?, apellidos=?, domicilio=?, colonia=?, codigo_postal=?, telefono=?, email=?, fecha_nacimiento=?, estatura=?, peso=? WHERE id=?";
                        stmt = conn.prepareStatement(sql);
                        stmt.setString(1, curp);
                        stmt.setString(2, nombre);
                        stmt.setString(3, apellidos);
                        stmt.setString(4, domicilio);
                        stmt.setString(5, colonia);
                        stmt.setString(6, codigo_postal);
                        stmt.setString(7, telefono);
                        stmt.setString(8, email);
                        stmt.setString(9, fecha_nacimiento);
                        stmt.setDouble(10, Double.parseDouble(estatura));
                        stmt.setDouble(11, Double.parseDouble(peso));
                        stmt.setInt(12, Integer.parseInt(id));

                        int filasAfectadas = stmt.executeUpdate();
                        if (filasAfectadas > 0) {
                            out.println("<p class='alert alert-success'>Registro actualizado correctamente.</p>");
                        } else {
                            out.println("<p class='alert alert-danger'>No se pudo actualizar el registro.</p>");
                        }
                    } catch (Exception e) {
                        out.println("<p class='alert alert-danger'>Error: " + e.getMessage() + "</p>");
                    } finally {
                        if (stmt != null) stmt.close();
                    }
                }
            %>
        </div>
    </section>

    <footer class="pie">
        <p>Derechos Reservados © 2025</p>
    </footer>
</body>
</html>
