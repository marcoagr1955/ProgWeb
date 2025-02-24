const express = require("express");
const fs = require("fs");
const path = require("path");

const app = express();
const PORT = 3000;

app.use(express.static(__dirname));
app.use(express.json({ limit: "10mb" }));

// Crear carpetas si no existen
const directorios = ["images", "images/persona", "images/animal"];
directorios.forEach(dir => {
    if (!fs.existsSync(dir)) {
        fs.mkdirSync(dir, { recursive: true });
    }
});

// Ruta para recibir y guardar la imagen
app.post("/guardar-imagen", (req, res) => {
    try {
        const { imagen, nombre, tipo } = req.body;
        if (!imagen || !nombre || !tipo) return res.status(400).json({ error: "Datos inválidos" });

        const carpetaDestino = tipo === "persona" ? "images/persona" : "images/animal";
        const base64Data = imagen.replace(/^data:image\/jpeg;base64,/, "");
        const filePath = path.join(__dirname, carpetaDestino, nombre);

        fs.writeFileSync(filePath, base64Data, "base64");
        console.log(`✅ Imagen guardada en ${carpetaDestino}: ${filePath}`);

        res.json({ mensaje: "Imagen guardada correctamente" });

    } catch (error) {
        console.error("❌ Error al guardar la imagen:", error);
        res.status(500).json({ error: "Error interno del servidor" });
    }
});

app.listen(PORT, () => {
    console.log(`🚀 Servidor corriendo en http://localhost:${PORT}`);
});
