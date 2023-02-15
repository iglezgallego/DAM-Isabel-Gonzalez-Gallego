#Importo la libreria y creo un alias, el nombre que quieras. Para poder trabajar con bbdds
import sqlite3 as lite

#importo modulo del sistema para leer y escribir archivos del disco duro
import sys

#Me conecto a una base de datos llamada agenda
conexion = lite.connect("agenda.sqlite")

#Establezco un cursor para saber en que punto de la base de datos voy a trabajar
cursor = conexion.cursor()

#Le pido algo a la base de datos en lenguaje SQL
cursor.execute("INSERT INTO contactos VALUES (NULL,'Rita','45124','rita@rita.com');")

conexion.commit()
