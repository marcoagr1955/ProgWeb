<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
    </head>
    <body>
     <p>Programacion WEB</p>
<br>
 <p>Datos recibidos por  servidor</p>
<!--  Es un script en lenguaje PHP  --> 
<?php
   $nombre= $_POST["nombre"];
   $contra=$_POST["contra"];
   $fnac = $_POST["fnac"];
   $antig = $_POST[antig];
   $estat = $_POST[estat];
   $email = $_POST["email"];
   $precio = $_POST["precio"];

   
   $antig = (int) $antig;
   $estat = (double) $estat;
  // $precio= (double) $precio;

   $precio = $precio;
   echo "Nombre :" . $nombre. "<br>";
     echo "Contraseña :" . $contra. "<br>";
  echo "Fecha de nacimiento :" . $fnac. "<br>";
  echo "Antiguedad :" . $antig. "<br>";
   echo "Estatura :" . $estat. "<br>";
   echo "Email :" . $email. "<br>";
    echo "Precio " . $precio. "<br>";
   

?>
</body>
</html>