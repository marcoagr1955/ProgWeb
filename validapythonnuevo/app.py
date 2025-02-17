from flask import Flask, render_template, request
import os

app = Flask(__name__)

UPLOAD_FOLDER = 'uploads'
os.makedirs(UPLOAD_FOLDER, exist_ok=True)
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/procesa', methods=['POST'])
def procesa():
    campos = ["text", "color", "date", "datetime-local", "email", "month", "number", "password",
              "range", "search", "tel", "time", "url", "week", "textarea", "select", "checkbox", "radio"]

    datos = {campo: request.form.get(campo, "No enviado") for campo in campos}

    archivo = request.files.get("file")
    if archivo and archivo.filename:
        archivo_path = os.path.join(app.config['UPLOAD_FOLDER'], archivo.filename)
        archivo.save(archivo_path)
        datos["archivo"] = archivo.filename
    else:
        datos["archivo"] = "No enviado"

    return render_template('procesa.html', datos=datos)

if __name__ == '__main__':
    app.run(debug=True)
