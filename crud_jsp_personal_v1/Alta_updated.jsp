<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ page import="java.sql.*" %>
<%@ include file="conexion.jsp" %> <!-- Incluir la conexión a la BD -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de tabla de Personal</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/stylesalta.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <header class="encabezado"> 
        <h1>Datos de tabla de Personal</h1>
        <a href="index.jsp">Regresar a inicio</a> 
    </header>

 <!--   <section class="contenido">
        <div class="container mt-4">
            <h2>Registrar Nuevo Personal</h2>
            <form action="Alta_updated.jsp" method="post">
                <div class="mb-3">
                    <label class="form-label">CURP:</label>
                    <input type="text" name="curp" class="form-control" maxlength="18" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Domicilio:</label>
                    <input type="text" name="domicilio" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Colonia:</label>
                    <input type="text" name="colonia" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Código Postal:</label>
                    <input type="text" name="codigo_postal" class="form-control" maxlength="5" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" maxlength="15">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estatura (cm):</label>
                    <input type="number" name="estatura" class="form-control" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Peso (kg):</label>
                    <input type="number" name="peso" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>  -->

        <%
            if (request.getMethod().equalsIgnoreCase("POST")) {
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

                if (curp != null && nombre != null && apellidos != null && domicilio != null && colonia != null &&
                    codigo_postal != null && email != null && fecha_nacimiento != null && estatura != null && peso != null) {

                    PreparedStatement stmt = null;
                    try {
                        String sql = "INSERT INTO personal (curp, nombre, apellidos, domicilio, colonia, codigo_postal, telefono, email, fecha_nacimiento, estatura, peso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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

                        int filasAfectadas = stmt.executeUpdate();

                        if (filasAfectadas > 0) {
                            out.println("<p class='alert alert-success'>Registro guardado exitosamente.</p>");
                        } else {
                            out.println("<p class='alert alert-danger'>Error al guardar el registro.</p>");
                        }
                    } catch (Exception e) {
                        out.println("<p class='alert alert-danger'>Error: " + e.getMessage() + "</p>");
                    } finally {
                        if (stmt != null) stmt.close();
                    }
                }
            }
        %>

        <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CURP</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Domicilio</th>
                        <th>Colonia</th>
                        <th>Código Postal</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Fecha Nacimiento</th>
                        <th>Estatura</th>
                        <th>Peso</th>
                    </tr>
                </thead>
                <tbody>
                    <%
                        String query = "SELECT * FROM personal ORDER BY id DESC";
                        PreparedStatement stmt = conn.prepareStatement(query);
                        ResultSet result = stmt.executeQuery();
                        while (result.next()) {
                            out.println("<tr>");
                            out.println("<td>" + result.getInt("id") + "</td>");
                            out.println("<td>" + result.getString("curp") + "</td>");
                            out.println("<td>" + result.getString("nombre") + "</td>");
                            out.println("<td>" + result.getString("apellidos") + "</td>");
                            out.println("<td>" + result.getString("domicilio") + "</td>");
                            out.println("<td>" + result.getString("colonia") + "</td>");
                            out.println("<td>" + result.getString("codigo_postal") + "</td>");
                            out.println("<td>" + result.getString("telefono") + "</td>");
                            out.println("<td>" + result.getString("email") + "</td>");
                            out.println("<td>" + result.getString("fecha_nacimiento") + "</td>");
                            out.println("<td>" + result.getDouble("estatura") + "</td>");
                            out.println("<td>" + result.getDouble("peso") + "</td>");
                            out.println("</tr>");
                        }
                    %>
                </tbody>
            </table>
        </div>
    </section>

    <footer class="pie">
        <p>Derechos Reservados © 2025</p>
    </footer>
</body>
</html>
