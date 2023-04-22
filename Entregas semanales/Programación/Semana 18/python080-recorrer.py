import os
from PIL import Image
import math
##RECORRER VARIOS ARCHIVOS DE UNA CARPETA A LA VEZ 

#te dice cuales son los archivos de la carpeta en la que estoy
for root, dirs, files in os.walk("./carpetaconcosas/"):
    for filename in files:
        print(filename)
        imagen = Image.open("./carpetaconcosas/"+filename)
        pixeles = imagen.load()
        altura = imagen.size[1]
        anchura = imagen.size[0]
        
        for x in range(0, anchura):
            for y in range(0, altura):
                rojo = pixeles[x,y][0]
                verde = pixeles[x,y][1]
                azul = pixeles[x,y][2]
                
                color = math.floor((rojo+verde+azul)/3)
                rojo = color
                verde = color
                azul = color
                
                pixeles[x,y] = (rojo, verde, azul)

        imagen.save("./carpetaconcosas/"+filename)
        ##contador += 1
