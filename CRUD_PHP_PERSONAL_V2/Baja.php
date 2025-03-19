<?php
// Conexión a la base de datos
include 'conexion.php';

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$resultado = null;
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curp = $_POST['curp'];
    
    $sql = "SELECT * FROM personal WHERE curp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $curp);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows == 0) {
        $mensaje = "No se encontró ningún registro con esa CURP.";
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de Personal</title>
    <link rel="stylesheet" href="css/stylesalta_act.css">
</head>
<body>
    <div class="encabezado">
        <h1>Baja de Personal</h1>
        <p>Ingrese el CURP para eliminar un registro</p>
        <a href="index.php">Regresar a inicio</a>
    </div>
    
    <div class="contenido">

        <form action="Baja.php" method="POST" class="form-container">
            <label for="curp">CURP:</label>
            <input type="text" id="curp" name="curp" required>
            <button type="submit">Buscar</button>
        </form>
    </div>
    
    <div class="table-container">

        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>CURP</th>
                    <th>Domicilio</th>
                    <th>Colonia</th>
                    <th>Código Postal</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Estatura</th>
                    <th>Peso</th>
                    <th>Acción</th>
                </tr>
                <?php $fila = $resultado->fetch_assoc(); ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['id']); ?></td>
                    <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($fila['apellidos']); ?></td>
                    <td><?php echo htmlspecialchars($fila['curp']); ?></td>
                    <td><?php echo htmlspecialchars($fila['domicilio']); ?></td>
                    <td><?php echo htmlspecialchars($fila['colonia']); ?></td>
                    <td><?php echo htmlspecialchars($fila['codigo_postal']); ?></td>
                    <td><?php echo htmlspecialchars($fila['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($fila['email']); ?></td>
                    <td><?php echo htmlspecialchars($fila['fecha_nacimiento']); ?></td>
                    <td><?php echo htmlspecialchars($fila['estatura']); ?></td>
                    <td><?php echo htmlspecialchars($fila['peso']); ?></td>
                    <td>
                        <form action="delete.php" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                            <input type="hidden" name="curp" value="<?php echo htmlspecialchars($fila['curp']); ?>">
                            <button type="submit">Baja</button>
                        </form>
                    </td>
                </tr>
            </table>
        <?php elseif (!empty($mensaje)): ?>
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>
    </div>
    
    <footer class="pie">
        Derechos Reservados &copy; 2025
    </footer>
</body>
</html>