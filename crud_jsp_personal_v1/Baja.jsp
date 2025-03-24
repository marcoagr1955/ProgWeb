
<%@ page contentType="text/html; charset=UTF-8" %>
<%@ page import="java.sql.*" %>
<%@ include file="conexion.jsp" %>

<%
    String mensaje = ""; // Inicialización de la variable mensaje

    // Verificar si se ha recibido un CURP por POST
    String curp = request.getParameter("curp");
    ResultSet rs = null;
    PreparedStatement stmt = null;
    boolean encontrado = false;

    if (curp != null && !curp.trim().isEmpty()) {
        try {
            String sql = "SELECT * FROM personal WHERE curp = ?";
            stmt = conn.prepareStatement(sql);
            stmt.setString(1, curp);
            rs = stmt.executeQuery();

            if (rs.next()) {
                encontrado = true; // Se encontró el CURP
            } else {
                mensaje = "No se encontró un registro con el CURP proporcionado.";
            }
        } catch (Exception e) {
            mensaje = "Error al buscar el registro: " + e.getMessage();
        }
    }
%>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de  Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/stylesalta_act.css">
</head>
<body>
    <header class="encabezado">
        <h1>Baja de Registro</h1>
       
    </header>

    <section class="contenido">
         <a href="index.jsp">Regresar a inicio</a>
        <div class="form-container">
            <h2>Buscar Registro</h2>
            <form method="post" action="Baja.jsp">
                <label for="curp">CURP del Registro:</label>
                <input type="text" name="curp" maxlength="18" required>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <div class="table-container">
            <% if (!mensaje.isEmpty()) { %>
                <p class="alert alert-warning"><%= mensaje %></p>
            <% } %>

            <% if (encontrado) { %>
                <form action="delete.jsp" method="post" onsubmit="return confirmarBaja()">
                    <table>
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
                            <tr>
                                <td><input type="text" name="id" value="<%= rs.getInt("id") %>" readonly ></td>
                                <td><input type="text" name="curp" value="<%= rs.getString("curp") %>" readonly ></td>
                                <td><input type="text" name="nombre" value="<%= rs.getString("nombre") %>" readonly></td>
                                <td><input type="text" name="apellidos" value="<%= rs.getString("apellidos") %>" readonly></td>
                                <td><input type="text" name="domicilio" value="<%= rs.getString("domicilio") %>" readonly></td>
                                <td><input type="text" name="colonia" value="<%= rs.getString("colonia") %>" readonly ></td>
                                <td><input type="text" name="codigo_postal" value="<%= rs.getString("codigo_postal") %>" readonly></td>
                                <td><input type="text" name="telefono" value="<%= rs.getString("telefono") %>" readonly></td>
                                <td><input type="text" name="email" value="<%= rs.getString("email") %>" readonly ></td>
                                <td><input type="date" name="fecha_nacimiento" value="<%= rs.getString("fecha_nacimiento") %>" readonly></td>
                                <td><input type="text" name="estatura" value="<%= rs.getDouble("estatura") %>" readonly></td>
                                <td><input type="text" name="peso" value="<%= rs.getDouble("peso") %>" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" >Baja </button>
                </form>

            <% } %>
        </div>
    </section>

    <footer class="pie">
        <p>Derechos Reservados © 2025</p>
    </footer>
    <script>
       function confirmarBaja() {
        return confirm("¿Estás seguro de que deseas dar de baja este registro?");
        }
    </script> 
</body>
</html>

<%
    // Cerrar recursos
    if (rs != null) rs.close();
    if (stmt != null) stmt.close();
%>
