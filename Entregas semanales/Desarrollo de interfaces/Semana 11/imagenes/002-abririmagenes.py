from PIL import Image
import os
##Proceso las imagenes de la carpeta crudo
carpeta = "001-crudo"

archivos = os.listdir(carpeta)

##Para cada una de las imagenes
for archivo in archivos:
    ##Quiero unir la carpeta con el archivo
    imagen = os.path.join(carpeta,archivo)
    print(imagen)
