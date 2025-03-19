<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

// Verificar conexión
if (!isset($conn) || $conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$mensaje = "";

// Verificar si los datos fueron enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $id = trim($_POST["id"]);
    $curp = trim($_POST["curp"]);
    $nombre = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $domicilio = trim($_POST["domicilio"]);
    $colonia = trim($_POST["colonia"]);
    $codigo_postal = trim($_POST["codigo_postal"]);
    $telefono = trim($_POST["telefono"]);
    $fecha_nacimiento = trim($_POST["fecha_nacimiento"]);
    $estatura = trim($_POST["estatura"]);
    $peso = trim($_POST["peso"]);

    // Crear la consulta SQL para actualizar los datos
    $sql = "UPDATE personal SET 
                nombre = ?, 
                apellidos = ?, 
                domicilio = ?, 
                colonia = ?, 
                codigo_postal = ?, 
                telefono = ?, 
                fecha_nacimiento = ?, 
                estatura = ?, 
                peso = ? 
            WHERE id = ? AND curp = ?";

    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "sssssssssss", 
            $nombre, 
            $apellidos, 
            $domicilio, 
            $colonia, 
            $codigo_postal, 
            $telefono, 
            $fecha_nacimiento, 
            $estatura, 
            $peso, 
            $id, 
            $curp
        );

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $mensaje = "Actualización exitosa.";
        } else {
            $mensaje = "No se actualizó por algún error.";
        }

        // Cerrar la consulta
        $stmt->close();
    } else {
        $mensaje = "Error en la preparación de la consulta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
        <h2><?php echo $mensaje; ?></h2>
        <a href="index.php" class="btn btn-primary mt-3">Regresar a inicio</a>
    </div>
</body>
</html>
