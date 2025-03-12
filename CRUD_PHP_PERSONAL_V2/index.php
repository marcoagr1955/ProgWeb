<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Empresarial</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="pre_estilo.css">
</head>
<body>

    <!-- Menú de Navegación CRUD -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CRUD Empresarial</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="Formulario_alta.php">Altas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Editar</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Bajas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Búsquedas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-wrapper mt-4">
        
        <!-- Imagen fija en la página -->
        <img src="https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg" class="fixed-image" alt="Equipo de trabajo">

        <!-- Contenido del CRUD -->
        <div class="mt-5">
            <h2>Bienvenido al CRUD Empresarial</h2>
            <p>Selecciona una opción en el menú para administrar los registros.</p>
        </div>

    </div>

</body>
</html>
