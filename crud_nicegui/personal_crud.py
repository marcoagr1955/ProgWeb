from db import get_connection

def obtener_personal():
    conn = get_connection()
    cursor = conn.cursor(dictionary=True)
    cursor.execute("SELECT * FROM personal")
    resultado = cursor.fetchall()
    conn.close()
    return resultado

def insertar_persona(data):
    conn = get_connection()
    cursor = conn.cursor()
    sql = """INSERT INTO personal
        (curp, nombre, apellidos, domicilio, colonia, codigo_postal, telefono, email, fecha_nacimiento, estatura, peso)
        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"""
    cursor.execute(sql, (
        data['curp'], data['nombre'], data['apellidos'], data['domicilio'],
        data['colonia'], data['codigo_postal'], data['telefono'], data['email'],
        data['fecha_nacimiento'], data['estatura'], data['peso']
    ))
    conn.commit()
    conn.close()

def eliminar_persona(id):
    conn = get_connection()
    cursor = conn.cursor()
    cursor.execute("DELETE FROM personal WHERE id = %s", (id,))
    conn.commit()
    conn.close()

def buscar_por_curp(curp):
    conn = get_connection()
    cursor = conn.cursor(dictionary=True)
    cursor.execute("SELECT * FROM personal WHERE curp = %s", (curp,))
    resultado = cursor.fetchone()
    conn.close()
    return resultado

def actualizar_persona(id, data):
    conn = get_connection()
    cursor = conn.cursor()
    sql = """UPDATE personal SET
        curp=%s, nombre=%s, apellidos=%s, domicilio=%s, colonia=%s,
        codigo_postal=%s, telefono=%s, email=%s, fecha_nacimiento=%s,
        estatura=%s, peso=%s WHERE id=%s"""
    cursor.execute(sql, (
        data['curp'], data['nombre'], data['apellidos'], data['domicilio'],
        data['colonia'], data['codigo_postal'], data['telefono'], data['email'],
        data['fecha_nacimiento'], data['estatura'], data['peso'], id
    ))
    conn.commit()
    conn.close()
