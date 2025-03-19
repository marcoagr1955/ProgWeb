<?php
// Conexión a la base de datos
include 'conexion.php';

// Verificar conexión
if (!isset($conn) || $conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$resultado = null;
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curp = trim($_POST["curp"]);

    if (!empty($curp)) {
        $sql = "SELECT * FROM personal WHERE curp = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $curp);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $stmt->close();
        } else {
            $mensaje = "Error en la consulta SQL: " . $conn->error;
        }

        if ($resultado->num_rows == 0) {
            $mensaje = "No se encontró el registro.";
        }
    } else {
        $mensaje = "Por favor, ingresa el CURP.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tabla de Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/stylesalta_act.css">
</head>
<body>
    <header class="encabezado">
        <h1>Actualización de tabla de Personal</h1>
        <h4>Búsqueda en la Base de Datos</h4>
    </header>
    <section class="contenido">
        
        <div class="form-container">
            <a href="index.php">Regresar a inicio</a> 
            <form method="POST" action="Editar.php">
                <label for="curp">CURP:</label>
                <input type="text" name="curp" id="curp">
                <button type="submit">Buscar</button>
            </form>
        </div>

        <?php if (!empty($mensaje)): ?>
            <div><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <?php if (isset($resultado) && $resultado->num_rows > 0): ?>
        <div class="table-container">
            <form method="POST" action="actualiza.php">
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
                        <?php while ($row = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><input type="text" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" readonly></td>
                                <td><input type="text" name="curp" value="<?php echo htmlspecialchars($row['curp']); ?>" readonly></td>
                                <td><input type="text" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>"></td>
                                <td><input type="text" name="apellidos" value="<?php echo htmlspecialchars($row['apellidos']); ?>"></td>
                                <td><input type="text" name="domicilio" value="<?php echo htmlspecialchars($row['domicilio']); ?>"></td>
                                <td><input type="text" name="colonia" value="<?php echo htmlspecialchars($row['colonia']); ?>"></td>
                                <td><input type="text" name="codigo_postal" value="<?php echo htmlspecialchars($row['codigo_postal']); ?>"></td>
                                <td><input type="text" name="telefono" value="<?php echo htmlspecialchars($row['telefono']); ?>"></td>
                                <td><input type="text" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" readonly></td>
                                <td><input type="text" name="fecha_nacimiento" value="<?php echo htmlspecialchars($row['fecha_nacimiento']); ?>"></td>
                                <td><input type="text" name="estatura" value="<?php echo htmlspecialchars($row['estatura']); ?>"></td>
                                <td><input type="text" name="peso" value="<?php echo htmlspecialchars($row['peso']); ?>"></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <button type="submit">Actualizar</button>
            </form>
        </div>
        <?php endif; ?>
    </section>
    <footer class="pie">
        <p>Derechos Reservados © 2025</p>
    </footer>
    <?php if (isset($conn)) $conn->close(); ?>
</body>
</html>
