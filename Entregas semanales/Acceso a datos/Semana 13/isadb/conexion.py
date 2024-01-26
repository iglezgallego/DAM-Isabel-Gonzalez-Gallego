##CONECTOR DE ESCRITURA (INSERT)

#Del archivo isadb_conector importo la clase isadb
from isadb_conector import Isadb

#Hago una instancia de la clase
Conexion1 = Isadb("miempresa")
Conexion1.insert("clientes", "cliente10", "este es otro contenido de prueba")
