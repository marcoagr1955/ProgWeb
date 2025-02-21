const express = require("express");
const fs = require("fs");
const path = require("path");

const app = express();
const PORT = 3000;

// Servir archivos estáticos (para acceder al HTML sin `file://`)
app.use(express.static(__dirname));

// Middleware para permitir JSON en las solicitudes
app.use(express.json({ limit: "10mb" }));

// Middleware para evitar problemas de CORS
app.use((req, res, next) => {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Methods", "GET, POST, OPTIONS");
    res.header("Access-Control-Allow-Headers", "Content-Type");
    if (req.method === "OPTIONS") {
        return res.sendStatus(200);
    }
    next();
});

// Ruta para recibir y guardar la imagen
app.post("/guardar-imagen", (req, res) => {
    try {
        const { imagen, nombre } = req.body;

        if (!imagen || !nombre) {
            return res.status(400).json({ error: "Datos inválidos" });
        }

        // Guardar la imagen en la carpeta "images"
        const base64Data = imagen.replace(/^data:image\/jpeg;base64,/, "");
        const filePath = path.join(__dirname, "images", nombre);

        fs.writeFileSync(filePath, base64Data, "base64");

        console.log(`✅ Imagen guardada: ${filePath}`);
        res.json({ mensaje: "Imagen guardada correctamente", ruta: filePath });
    } catch (error) {
        console.error("❌ Error al guardar la imagen:", error);
        res.status(500).json({ error: "Error interno del servidor" });
    }
});

// Iniciar el servidor en el puerto 3000
app.listen(PORT, () => {
    console.log(`🚀 Servidor corriendo en http://localhost:${PORT}`);
});
