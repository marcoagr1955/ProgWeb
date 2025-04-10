from flask import Blueprint, render_template

busqueda_bp = Blueprint('busqueda_bp', __name__)

@busqueda_bp.route('/busqueda')
def busqueda():
    return render_template('busqueda.html')
