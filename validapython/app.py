from flask import Flask, render_template_string, request

app = Flask(__name__)

# Página principal (Front-End)
@app.route('/')
def index():
    html_form = '''
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Inicio</title>
        </head>
        <body>
            <p>Programación WEB</p>
            <form method="POST" action="/procesar">
                <table>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="nombre" maxlength="35" placeholder="Tu nombre" required></td>
                    </tr>
                    <tr>
                        <td>Contraseña:</td>
                        <td><input type="password" name="contra" placeholder="Contraseña" required></td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento:</td>
                        <td><input type="date" name="fnac" required></td>
                    </tr>
                    <tr>
                        <td>Antigüedad en años:</td>
                        <td><input type="number" name="antig" min="1" max="40" required></td>
                    </tr>
                    <tr>
                        <td>Estatura:</td>
                        <td><input type="number" step="0.01" name="estat" min="1" max="2.5" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Precio de su producto:</td>
                        <td><input type="text" name="precio" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar"></td>
                    </tr>
                </table>
            </form>
        </body>
    </html>
    '''
    return html_form

# Procesar datos (Back-End)
@app.route('/procesar', methods=['POST'])
def procesar():
    datos = {
        'nombre': request.form['nombre'],
        'contra': request.form['contra'],
        'fnac': request.form['fnac'],
        'antig': int(request.form['antig']),
        'estat': float(request.form['estat']),
        'email': request.form['email'],
        'precio': request.form['precio'],
    }
    html_result = f'''
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Datos Recibidos</title>
        </head>
        <body>
            <p>Programación WEB</p>
            <p>Datos recibidos por el servidor:</p>
            <ul>
                <li>Nombre: {datos['nombre']}</li>
                <li>Contraseña: {datos['contra']}</li>
                <li>Fecha de Nacimiento: {datos['fnac']}</li>
                <li>Antigüedad: {datos['antig']} años</li>
                <li>Estatura: {datos['estat']} metros</li>
                <li>Email: {datos['email']}</li>
                <li>Precio: {datos['precio']}</li>
            </ul>
        </body>
    </html>
    '''
    return html_result

if __name__ == '__main__':
    app.run(debug=True)
