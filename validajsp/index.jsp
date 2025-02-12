<!-- index.jsp -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
    </head>
    <body>
        <p>Programación WEB</p>
        <form name="Inicial" method="post" action="recibe.jsp">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" maxlength="35" placeholder="Tu nombre" required title="Ingresa tu nombre" pattern="[A-Za-z\s]+"></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="password" name="contra" placeholder="Contraseña" required title="Una letra mayúscula,5 minúsculas y 4 dígitos" pattern="[A-Z]{1}[a-z]{5}[0-9]{4}"></td>
                </tr>
                <tr>
                    <td>Fecha de Nacimiento:</td>
                    <td><input type="date" name="fnac" required title="Ingresa tu fecha de nacimiento"></td>
                </tr>
                <tr>
                    <td>Antigüedad en años:</td>
                    <td><input type="number" name="antig" min="1" max="40" required title="Años de antigüedad"></td>
                </tr>
                <tr>
                    <td>Estatura:</td>
                    <td><input type="number" step="0.01" name="estat" min="1" max="2.5" required title="Altura en metros"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="email" required title="Tu email"></td>
                </tr>
                <tr>
                    <td>Precio de su producto:</td>
                    <td><input type="text" name="precio" placeholder="precio" required title="El precio" pattern="\d+(\.\d{2})?"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Enviar"></td>
                </tr>
            </table>
        </form>
    </body>
</html>