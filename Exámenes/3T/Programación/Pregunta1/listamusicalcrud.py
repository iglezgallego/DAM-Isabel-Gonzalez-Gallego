#Importo la libreria y creo un alias, el nombre que quieras. Para poder trabajar con bbdds
import sqlite3 as lite

#importo modulo del sistema para leer y escribir archivos del disco duro
import sys

#Creo la conexiona a una base de datos llamada listamusical
conexion = lite.connect("listamusical.sqlite")

#Establezco un cursor para saber en que punto de la base de datos voy a trabajar
cursor = conexion.cursor()

#defino una funcion para listar registros
def listar_registros():
    cursor.execute('SELECT * FROM cds')
    registros = cursor.fetchall()
    for registro in registros:
        print(registro)
#defino una funcion para buscar registros
def buscar_registros():
    busqueda = input("Introduce el término de búsqueda: ")
    cursor.execute('SELECT * FROM cds WHERE titulo LIKE ? OR artista LIKE ? OR genero LIKE ? OR anio LIKE ?', ('%' + busqueda + '%', '%' + busqueda + '%', '%' + busqueda + '%', '%' + busqueda + '%'))
    registros = cursor.fetchall()
    for registro in registros:
        print(registro)
#defino una funcion para introducir registros        
def introducir_registro():
    titulo = input("Introduce el título del álbum: ")
    artista = input("Introduce el nombre del artista: ")
    anio = input("Introduce el año de lanzamiento: ")
    genero = input("Introduce el género musical: ")
    cursor.execute('INSERT INTO cds (titulo, artista, anio, genero) VALUES (?, ?, ?, ?)', (titulo, artista, anio, genero))
    conexion.commit()
    print("Registro insertado correctamente.")
#defino una función para actualizar registros
def actualizar_registro():
    id_registro = input("Introduce el ID del registro a actualizar: ")
    nuevo_titulo = input("Introduce el nuevo título del álbum: ")
    nuevo_artista = input("Introduce el nuevo nombre del artista: ")
    nuevo_anio = input("Introduce el nuevo año de lanzamiento: ")
    nuevo_genero = input("Introduce el nuevo género musical: ")
    cursor.execute('UPDATE cds SET titulo = ?, artista = ?, anio = ?, genero = ? WHERE Identificador = ?', (nuevo_titulo, nuevo_artista, nuevo_anio, nuevo_genero, id_registro))
    conexion.commit()
    print("Registro actualizado correctamente.")
#defino una función para eliminar registros
def eliminar_registro():
    id_registro = input("Introduce el ID del registro a eliminar: ")
    cursor.execute('DELETE FROM cds WHERE Identificador = ?', (id_registro,))
    conexion.commit()
    print("Registro eliminado correctamente.")

#defino la agenda para mostrar el menú y recibir la opcion del usuario:
def miAgenda():
    # Menú inicial
    while True:
        print("Escoge tu opción")
        print("1.-Listar registros")
        print("2.-Buscar registro")
        print("3.-Introducir registro")
        print("4.-Actualizar registro")
        print("5.-Eliminar registro")
        print("6.-Salir")

        opcion = input("Opción: ")
#que función debe ejecutar el programa según la opción seleccionada
        if opcion == "1":
                listar_registros()
        elif opcion == "2":
                buscar_registros()
        elif opcion == "3":
                introducir_registro()
        elif opcion == "4":
                actualizar_registro()
        elif opcion == "5":
                eliminar_registro()
        elif opcion == "6":
            break
        else:
            print("Opción no válida. Por favor, seleccione una opción del 1 al 6")
#llamo a la función desde fuera
miAgenda()
