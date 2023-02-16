# pip install db-sqlite3
import sqlite3 as basedatos
import math
conexion = basedatos.connect("apellidos.db")
#Establezco un cursor para realizar peticiones
cursor = conexion.cursor()
#Realizo la petición
cursor.execute("SELECT * FROM apellidos;")
#coge todos los elementos de la bbdd
datos = cursor.fetchall()

##LISTA DE TODOS LOS APELLIDOS DE LA BBDD

print("Lista de los apellidos más comunes de España:")
todosapellidos = []
for i in datos:
    #Guardo la columna 1 con los apellidos en una lista
    todosapellidos.append(i[1])
#Imprimo la lista con todos los apellidos
print(todosapellidos)
print("\n")

def apellido():
    ##LISTA CON TODOS LOS APELLIDOS QUE EMPIEZAN CON LA MISMA LETRA QUE EL MIO
    #Pregunto al usuario
    print("Dime la letra por la que empieza tu apellido en mayúsculas")
    #Creo una variable con la letra por la que empieza mi apellido    
    letra = input()
    #Creo una lista vacía
    apellidosconletra = []
    #itero a través de cada uno de los datos
    for i in datos:
        #Si el elemento empieza por la letra deseada
        if (i[1]).startswith(letra):
            #lo añado a la lista apellidosconletra
            apellidosconletra.append(i[1])

    ##print(apellidosconletra)
    print("Lista de los apellidos que empiezan con la misma letra que el tuyo, letra:",letra)
    #imprimo los apellidos que empiezan con la letra que introduzcas
    for apellidoinput in apellidosconletra:
        print(apellidoinput)
    print("\n")

    ##MOSTRAR CUANTOS APELLIDOS HAY EN EL LISTADO ANTERIOR
    numeroapellidos = len(apellidosconletra)
    print("Aparecen",numeroapellidos,"apellidos con la misma inicial que el tuyo \n")

    apellido()

apellido()
