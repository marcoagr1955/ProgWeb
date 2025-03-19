<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario e Imagen</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='css/estilo.css'>
    
</head>
<body>
    <header class="encabezado"> <!-- Contenedor de encabezado -->
        <h1>Registro de Personal</h1>
    </header>
    <section class="contenido">
        <!-- Formulario -->
        <div class="formulario">
            
            <form action='Alta_updated.php' method='POST'>
               
                <label for='curp'>CURP:</label>
                <input type='text' id='curp' name='curp' pattern='[A-Z0-9]{18}' maxlength='18' required>
            
            
                <label for='nombre'>Nombre:</label>
                <input type='text' id='nombre' name='nombre' required>
            
            
                <label for='apellidos'>Apellidos:</label>
                <input type='text' id='apellidos' name='apellidos' required>
           
            
                <label for='domicilio'>Domicilio:</label>
                <input type='text' id='domicilio' name='domicilio' required>
            
            
                <label for='colonia'>Colonia:</label>
                <input type='text' id='colonia' name='colonia' required>
            
            
                <label for='codigo_postal'>Código Postal:</label>
                <input type='text' id='codigo_postal' name='codigo_postal' pattern='\d{5}' maxlength='5' required>
            
            
                <label for='telefono'>Teléfono:</label>
                <input type='tel' id='telefono' name='telefono' pattern='[0-9]{10}' maxlength='10' required>
            
            
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' required>
            
            
                <label for='fecha_nacimiento'>Fecha de Nacimiento:</label>
                <input type='date' id='fecha_nacimiento' name='fecha_nacimiento' required>
            
            
                <label for='estatura'>Estatura (cm):</label>
                <input type='number' id='estatura' name='estatura' step='0.01' min='50' max='250' required>
            
            
                <label for='peso'>Peso (kg):</label>
                <input type='number' id='peso' name='peso' step='0.01' min='10' max='300' required>
            
                <button type="submit">Enviar</button>
            </form>
        </div>

        <!-- Imagen -->
        <div class="imagen">
            <img src="images\resized_image.jpg" alt="Imagen de referencia">
        </div>
    </section>
    <footer class="pie"> <!-- Contenedor de pie de página -->
        <p>Derechos Reservados © 2025</p>
    </footer>
</body>
</html>
