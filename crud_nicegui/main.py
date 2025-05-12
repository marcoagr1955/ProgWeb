from nicegui import ui
from personal_crud import obtener_personal, insertar_persona, eliminar_persona, buscar_por_curp, actualizar_persona

campos = {}

def construir_formulario(titulo='Agregar Persona', datos=None):
    campos.clear()
    with ui.card().classes('w-full'):
        ui.label(titulo).classes('text-h5 mb-2')
        for campo in ['curp', 'nombre', 'apellidos', 'domicilio', 'colonia',
                      'codigo_postal', 'telefono', 'email', 'fecha_nacimiento',
                      'estatura', 'peso']:
            campos[campo] = ui.input(label=campo.replace('_', ' ').capitalize())
        if datos:
            for k in campos:
                campos[k].value = str(datos[k])
        ui.button('Guardar cambios' if datos else 'Guardar', on_click=lambda: guardar_o_actualizar(datos['id'] if datos else None))

def guardar_o_actualizar(id=None):
    datos = {k: v.value for k, v in campos.items()}
    if id:
        actualizar_persona(id, datos)
        ui.notify('Registro actualizado correctamente')
    else:
        insertar_persona(datos)
        ui.notify('Persona registrada correctamente')
    ui.run_javascript('window.location.reload()')

def mostrar_tabla():
    with ui.card().classes('w-full mt-4'):
        ui.label('Registros existentes').classes('text-h5 mb-2')

        encabezados = [
            'ID', 'CURP', 'Nombre', 'Apellidos', 'Teléfono', 'Email', 'Acciones'
        ]
        with ui.row().classes('w-full font-bold'):
            for e in encabezados:
                ui.label(e).classes('w-1/6')

        datos = obtener_personal()
        for d in datos:
            with ui.row().classes('w-full items-center'):
                ui.label(str(d['id'])).classes('w-1/6')
                ui.label(d['curp']).classes('w-1/6')
                ui.label(d['nombre']).classes('w-1/6')
                ui.label(d['apellidos']).classes('w-1/6')
                ui.label(d['telefono']).classes('w-1/6')
                ui.label(d['email']).classes('w-1/6')
                with ui.row().classes('gap-2 w-1/6'):
                    ui.button('Editar', on_click=lambda e=d: construir_formulario('Editar Persona', e))
                    ui.button('Eliminar', on_click=lambda e=d['id']: eliminar_y_recargar(e))

def eliminar_y_recargar(id):
    eliminar_persona(id)
    ui.notify('Registro eliminado')
    ui.run_javascript('window.location.reload()')

def buscar_por_curp_ui():
    with ui.card().classes('w-full mt-4'):
        ui.label('Buscar por CURP').classes('text-h5 mb-2')
        curp_input = ui.input(label='CURP a buscar')
        def buscar():
            resultado = buscar_por_curp(curp_input.value)
            if resultado:
                construir_formulario('Editar Persona', resultado)
            else:
                ui.notify('CURP no encontrada')
        ui.button('Buscar', on_click=buscar)

# Interfaz principal
ui.label('Sistema de Gestión de Personal').classes('text-h4 mt-4 mb-4 text-primary')
construir_formulario()
buscar_por_curp_ui()
mostrar_tabla()

ui.run()
