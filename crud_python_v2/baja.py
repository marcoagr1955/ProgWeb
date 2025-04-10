from flask import Blueprint, render_template, request, redirect, url_for
from conexion import obtener_conexion

baja_bp = Blueprint('baja_bp', __name__)

@baja_bp.route('/baja', methods=['GET', 'POST'])
def baja():
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
    return render_template('baja.html', datos=datos, mensaje=mensaje)

@baja_bp.route('/confirmar_baja', methods=['POST'])
def confirmar_baja():
    curp = request.form['curp']
    conexion = obtener_conexion()
    cursor = conexion.cursor()
    cursor.execute("DELETE FROM personal WHERE curp = %s", (curp,))
    conexion.commit()
    cursor.close()
    conexion.close()
    mensaje = "Registro dado de baja exitosamente"
    return render_template('baja.html', datos=None, mensaje=mensaje)