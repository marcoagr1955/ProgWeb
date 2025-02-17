<?php
// Procesa.php - Recibir datos del formulario extendido

// Mostrar todos los datos recibidos
echo "<h1>Datos Recibidos</h1>";

// Recibir datos individuales
$text = isset($_POST['text']) ? $_POST['text'] : 'No enviado';
$color = isset($_POST['color']) ? $_POST['color'] : 'No enviado';
$date = isset($_POST['date']) ? $_POST['date'] : 'No enviado';
$datetime = isset($_POST['datetime-local']) ? $_POST['datetime-local'] : 'No enviado';
$email = isset($_POST['email']) ? $_POST['email'] : 'No enviado';
$month = isset($_POST['month']) ? $_POST['month'] : 'No enviado';
$number = isset($_POST['number']) ? $_POST['number'] : 'No enviado';
$password = isset($_POST['password']) ? $_POST['password'] : 'No enviado';
$range = isset($_POST['range']) ? $_POST['range'] : 'No enviado';
$search = isset($_POST['search']) ? $_POST['search'] : 'No enviado';
$tel = isset($_POST['tel']) ? $_POST['tel'] : 'No enviado';
$time = isset($_POST['time']) ? $_POST['time'] : 'No enviado';
$url = isset($_POST['url']) ? $_POST['url'] : 'No enviado';
$week = isset($_POST['week']) ? $_POST['week'] : 'No enviado';
$textarea = isset($_POST['textarea']) ? $_POST['textarea'] : 'No enviado';
$select = isset($_POST['select']) ? $_POST['select'] : 'No enviado';
$checkbox = isset($_POST['checkbox']) ? $_POST['checkbox'] : 'No enviado';
$radio = isset($_POST['radio']) ? $_POST['radio'] : 'No enviado';

// Manejar archivo enviado
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/'; // Directorio donde se guardará el archivo
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo "<strong>Archivo:</strong> El archivo ha sido subido exitosamente como: " . htmlspecialchars($_FILES['file']['name']) . "<br>";
    } else {
        echo "<strong>Archivo:</strong> Error al subir el archivo.<br>";
    }
} else {
    echo "<strong>Archivo:</strong> No enviado o hubo un error al subirlo. Código de error: " . $_FILES['file']['error'] . "<br>";
}

// Imprimir otros datos
echo "<strong>Texto:</strong> $text<br>";
echo "<strong>Color:</strong> $color<br>";
echo "<strong>Fecha:</strong> $date<br>";
echo "<strong>Fecha y Hora:</strong> $datetime<br>";
echo "<strong>Correo Electrónico:</strong> $email<br>";
echo "<strong>Mes:</strong> $month<br>";
echo "<strong>Número:</strong> $number<br>";
echo "<strong>Contraseña:</strong> $password<br>";
echo "<strong>Rango:</strong> $range<br>";
echo "<strong>Búsqueda:</strong> $search<br>";
echo "<strong>Teléfono:</strong> $tel<br>";
echo "<strong>Hora:</strong> $time<br>";
echo "<strong>URL:</strong> $url<br>";
echo "<strong>Semana:</strong> $week<br>";
echo "<strong>Textarea:</strong> $textarea<br>";
echo "<strong>Seleccionado:</strong> $select<br>";
echo "<strong>Checkbox:</strong> $checkbox<br>";
echo "<strong>Radio:</strong> $radio<br>";

?>