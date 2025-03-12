<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Personal</title>
    <link rel="stylesheet" href="stylesalta.css">
    <style>
        /* Ajustar la tabla a la izquierda */
        .table-container {
            display: flex;
            justify-content: flex-start; /* Alinear a la izquierda */
            padding-left: 20px; /* Espaciado a la izquierda */
        }

        table {
            width: auto; /* Evitar que se centre automáticamente */
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #007bff;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Personal</h2>
        <?php
            include 'conexion.php';
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

                $sql_insert = "INSERT INTO personal (curp, nombre, apellidos, domicilio, colonia, codigo_postal, telefono, email, fecha_nacimiento, estatura, peso) 
                              VALUES ('$curp', '$nombre', '$apellidos', '$domicilio', '$colonia', '$codigo_postal', '$telefono', '$email', '$fecha_nacimiento', '$estatura', '$peso')";
                
                if ($conn->query($sql_insert) === TRUE) {
                    echo "<p>Registro exitoso.</p>";
                } else {
                    echo "<p>Error al registrar: " . $conn->error . "</p>";
                }
            }
        ?>
    </div>

    <div class="table-container">
        <h3>Datos Registrados</h3>
        <table>
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
            <?php
                $sql = 'SELECT * FROM personal ORDER BY id DESC';
                $result = $conn->query($sql);
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
        </table>
    </div>
</body>
</html>
