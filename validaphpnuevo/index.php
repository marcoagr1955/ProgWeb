<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Extendido</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f9;
            }
            .container {
                width: 60%;
                margin: 30px auto;
                padding: 20px;
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
            h1 {
                text-align: center;
                color: #333;
            }
            form {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            label {
                font-weight: bold;
            }
            input, select, textarea {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            button {
                padding: 10px;
                background-color: #007BFF;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Formulario Extendido</h1>
            <form name="Extendido" method="post" action="procesa.php"  enctype="multipart/form-data">
                <label for="text">Texto:</label>
                <input type="text" id="text" name="text" placeholder="Escribe algo...">

                <label for="color">Color:</label>
                <input type="color" id="color" name="color">

                <label for="date">Fecha:</label>
                <input type="date" id="date" name="date">

                <label for="datetime-local">Fecha y Hora:</label>
                <input type="datetime-local" id="datetime-local" name="datetime-local">

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="ejemplo@correo.com">

                <label for="file">Archivo:</label>
                <input type="file" id="file" name="file">

                <label for="month">Mes y Año:</label>
                <input type="month" id="month" name="month">

                <label for="number">Número:</label>
                <input type="number" id="number" name="number">

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password">

                <label for="range">Rango:</label>
                <input type="range" id="range" name="range" min="0" max="100">

                <label for="search">Búsqueda:</label>
                <input type="search" id="search" name="search" placeholder="Buscar...">

                <label for="tel">Teléfono:</label>
                <input type="tel" id="tel" name="tel" placeholder="123-456-7890">

                <label for="time">Hora:</label>
                <input type="time" id="time" name="time">

                <label for="url">URL:</label>
                <input type="url" id="url" name="url" placeholder="https://ejemplo.com">

                <label for="week">Semana:</label>
                <input type="week" id="week" name="week">

                <label for="textarea">Textarea:</label>
                <textarea id="textarea" name="textarea" rows="4" placeholder="Escribe aquí..."></textarea>

                <label for="select">Selecciona una opción:</label>
                <select id="select" name="select">
                    <option value="opcion1">Opción 1</option>
                    <option value="opcion2">Opción 2</option>
                    <option value="opcion3">Opción 3</option>
                </select>

                <label>
                    <input type="checkbox" name="checkbox" value="si"> Acepto términos y condiciones
                </label>

                <label>
                    <input type="radio" name="radio" value="opcion1"> Opcion 1
                </label>
                <label>
                    <input type="radio" name="radio" value="opcion2"> Opcion 2
                </label>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>
