from flask import Flask, render_template
from alta import alta_bp
from baja import baja_bp
from modificacion import modificacion_bp
from busqueda import busqueda_bp

app = Flask(__name__)

app.register_blueprint(alta_bp)
app.register_blueprint(baja_bp)
app.register_blueprint(modificacion_bp)
app.register_blueprint(busqueda_bp)


@app.route('/')
def index():
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)

