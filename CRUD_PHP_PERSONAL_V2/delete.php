<?php
include 'conexion.php';
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['curp'])) {
    $curp = $_POST['curp'];
    
    $sql = "DELETE FROM personal WHERE curp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $curp);
    
    if ($stmt->execute()) {
         $mensaje = "Baja exitosa.";
    } else {
        $mensaje = "No se efectuo baja,  por algún error.";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de registro Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
        <h2><?php echo $mensaje; ?></h2>
        <a href="index.php" class="btn btn-primary mt-3">Regresar a inicio</a>
    </div>
</body>
</html>
