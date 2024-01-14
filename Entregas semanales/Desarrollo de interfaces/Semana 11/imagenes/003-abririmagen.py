from PIL import Image
import os

carpeta = "001-crudo"

archivos = os.listdir(carpeta)

##Para cada una de las imagenes
for archivo in archivos:
    ##Quiero unir la carpeta con el archivo
    imagen = os.path.join(carpeta,archivo)
    print(imagen)
    ##Abro la imagen
    miimagen = Image.open(imagen)
    ##Saco la anchura de la imagen por pantalla
    print(miimagen.width)
