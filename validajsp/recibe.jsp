<!-- recibe.jsp -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Datos Recibidos</title>
    </head>
    <body>
        <p>Programación WEB</p>
        <br>
        <p>Datos recibidos por el servidor:</p>
        <p>Nombre: <%= request.getParameter("nombre") %></p>
        <p>Contraseña: <%= request.getParameter("contra") %></p>
        <p>Fecha de nacimiento: <%= request.getParameter("fnac") %></p>
        <p>Antigüedad: <%= request.getParameter("antig") %> años</p>
        <p>Estatura: <%= request.getParameter("estat") %> metros</p>
        <p>Email: <%= request.getParameter("email") %></p>
        <p>Precio: <%= request.getParameter("precio") %></p>
    </body>
</html>