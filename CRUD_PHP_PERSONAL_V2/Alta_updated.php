<?php
// Conexión a la base de datos
include 'conexion.php';

// Verificar si se enviaron datos por el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curp = $_POST['curp'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $domicilio = $_POST['domicilio'];
    $colonia = $_POST['colonia'];
    $codigo_postal = $_POST['codigo_postal'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $estatura = $_POST['estatura'];
    $peso = $_POST['peso'];

    // Insertar datos en la tabla "personal"
    $sql_insert = "INSERT INTO personal (curp, nombre, apellidos, domicilio, colonia, codigo_postal, telefono, email, fecha_nacimiento, estatura, peso) 
                   VALUES ('$curp', '$nombre', '$apellidos', '$domicilio', '$colonia', '$codigo_postal', '$telefono', '$email', '$fecha_nacimiento', '$estatura', '$peso')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Registro exitoso.</p>";
    } else {
        echo "<p>Error al registrar: " . $conn->error . "</p>";
    }
}

// Consultar los datos de la tabla "personal"
$sql = 'SELECT * FROM personal ORDER BY id DESC';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de tabla de Personal</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/stylesalta.css">
</head>
<body>
    <header class="encabezado"> <!-- Contenedor de encabezado -->
        <h1>Datos de tabla de Personal</h1>
        <a href="index.php">Regresar a inicio</a> 
    </header>
    <section class="contenido"> <!-- Contenedor principal para centrar elementos -->
       

        

        <div class="table-container"> <!-- Contenedor de la tabla con scroll -->
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
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['curp']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['apellidos']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['domicilio']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['colonia']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['codigo_postal']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['telefono']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['fecha_nacimiento']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['estatura']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['peso']) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<tr><td colspan='12'>No hay registros en la base de datos</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div> <!-- Fin del contenedor de la tabla -->
    </section> <!-- Fin del contenedor principal -->
    <footer class="pie"> <!-- Contenedor de pie de página -->
        <p>Derechos Reservados © 2025</p>
    </footer>
</body>
</html>
 