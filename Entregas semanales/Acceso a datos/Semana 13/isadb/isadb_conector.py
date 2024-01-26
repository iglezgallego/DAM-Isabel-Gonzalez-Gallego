##Importo la librería subprocess
import subprocess

class Isadb:
    # Método constructor de la clase Isadb
    def __init__(self,basededatos):
        # Inicializa la instancia con el nombre de la base de datos
        self.basededatos = basededatos
    # Método para insertar datos en la base de datos   
    def insert(self,coleccion,documento,contenido):
        # Asigna los parámetros a variables de instancia
        self.operacion = "insert"
        self.coleccion = coleccion
        self.documento = documento
        self.contenido = contenido
        # Construye el comando para ejecutar en la línea de comandos
        comando = '"C:\\Users\\iglez\\Documents\\GitHub\\isadb\\isadb.exe" '+self.operacion+' '+self.basededatos+' '+self.coleccion+' '+self.documento+' "'+self.contenido+'"'
        # Ejecuta el comando y captura el resultado
        resultado = subprocess.run(comando,shell=True,stdout=subprocess.PIPE,stderr=subprocess.PIPE,text=True)
        # Verifica si la operación fue exitosa
        if resultado.returncode == 0:
            return("ok")
        else:
            return("ko")
