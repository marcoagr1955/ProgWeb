from flask import Blueprint, render_template, request, redirect, url_for
from conexion import obtener_conexion

alta_bp = Blueprint('alta_bp', __name__)

@alta_bp.route('/alta', methods=['GET', 'POST'])
def alta():
    if request.method == 'POST':
        datos = (
            request.form['curp'],
            request.form['nombre'],
            request.form['apellidos'],
            request.form['domicilio'],
            request.form['colonia'],
            request.form['codigo_postal'],
            request.form['telefono'],
            request.form['email'],
            request.form['fecha_nacimiento'],
            request.form['estatura'],
            request.form['peso']
        )
        conexion = obtener_conexion()
        cursor = conexion.cursor()
        sql = """
        INSERT INTO personal 
        (curp, nombre, apellidos, domicilio, colonia, codigo_postal, telefono, email, fecha_nacimiento, estatura, peso) 
        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
        """
        cursor.execute(sql, datos)
        conexion.commit()
        cursor.close()
        conexion.close()
        return redirect(url_for('index'))
    return render_template('alta.html')
