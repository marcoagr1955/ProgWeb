const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Middleware para procesar datos del formulario
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Servir archivos estáticos (index.html)
app.use(express.static(__dirname));

// Ruta para servir el formulario en "/validanodejs"
app.get('/validanodejs', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

// 📌 Ruta para recibir los datos del formulario y mostrarlos en el navegador
app.post('/recibir-datos', (req, res) => {
    const { nombre, contra, fnac, antig, estat, email, precio } = req.body;

    console.log('Datos recibidos:', {
        nombre,
        contra,
        fnac,
        antig,
        estat,
        email,
        precio
    });

    // Enviar los datos como respuesta en el navegador
    res.send(`
        <h2>Datos Recibidos en Node.js</h2>
        <p><strong>Nombre:</strong> ${nombre}</p>
        <p><strong>Contraseña:</strong> ${contra}</p>
        <p><strong>Fecha de Nacimiento:</strong> ${fnac}</p>
        <p><strong>Antigüedad:</strong> ${antig} años</p>
        <p><strong>Estatura:</strong> ${estat} metros</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Precio:</strong> ${precio}</p>
        <br>
        <a href="/validanodejs">Volver al Formulario</a>
    `);
});

// Iniciar el servidor
app.listen(port, () => {
    console.log(`Servidor corriendo en http://localhost:${port}/validanodejs`);
});




