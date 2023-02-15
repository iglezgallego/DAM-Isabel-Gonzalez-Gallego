#Importo la libreria y creo un alias, el nombre que quieras. Para poder trabajar con bbdds
import sqlite3 as lite

#importo modulo del sistema para leer y escribir archivos del disco duro
import sys

#Me conecto a una base de datos llamada agenda
conexion = lite.connect("agenda.sqlite")

#Establezco un cursor para saber en que punto de la base de datos voy a trabajar
cursor = conexion.cursor()

#Le pido algo a la base de datos en lenguaje SQL
cursor.execute("SELECT * FROM contactos;")
#Datos contiene lo que me devuelve la base de datos
##fechone solo obtiene el primer registro de la bbdd, fechall  obtiene todo
datos = cursor.fetchall()

for i in datos:
    print("ID:",i[0],"\t nombre:",i[1],"\t telefono:",i[2],"\t email:",i[3])
