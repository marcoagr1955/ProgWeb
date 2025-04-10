from flask import Blueprint, render_template, request, redirect, url_for, flash
from conexion import obtener_conexion

modificacion_bp = Blueprint('modificacion_bp', __name__)

@modificacion_bp.route('/modificacion', methods=['GET', 'POST'])
def modificacion():
    datos = None
    mensaje = None
    if request.method == 'POST':
        curp = request.form['curp']
        conexion = obtener_conexion()
        cursor = conexion.cursor(dictionary=True)
        cursor.execute("SELECT * FROM personal WHERE curp = %s", (curp,))
        datos = cursor.fetchone()
        cursor.close()
        conexion.close()
        if not datos:
            mensaje = "CURP no encontrado"
    return render_template('modificacion.html', datos=datos, mensaje=mensaje)

@modificacion_bp.route('/actualizar', methods=['POST'])
def actualizar():
    datos = (
        request.form['nombre'],
        request.form['apellidos'],
        request.form['domicilio'],
        request.form['colonia'],
        request.form['codigo_postal'],
        request.form['telefono'],
        request.form['fecha_nacimiento'],
        request.form['estatura'],
        request.form['peso'],
        request.form['curp']
    )
    conexion = obtener_conexion()
    cursor = conexion.cursor()
    cursor.execute("""
        UPDATE personal 
        SET nombre=%s, apellidos=%s, domicilio=%s, colonia=%s, codigo_postal=%s, telefono=%s, fecha_nacimiento=%s, estatura=%s, peso=%s
        WHERE curp=%s
    """, datos)
    conexion.commit()
    cursor.close()
    conexion.close()
    mensaje = "Registro actualizado correctamente"
    return render_template('modificacion.html', datos=None, mensaje=mensaje)
