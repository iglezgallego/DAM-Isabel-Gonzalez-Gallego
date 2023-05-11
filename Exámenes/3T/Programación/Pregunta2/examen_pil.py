from PIL import Image
import math

imagen = Image.open("jv.jpg")
pixeles = imagen.load()

#cojo la altura y la anchura
altura = imagen.size[1]
anchura = imagen.size[0]
#recorre la imagen pixel a pixel
for x in range(0, anchura):
    for y in range(0, altura):
        #almaceno colores
        rojo = pixeles[x,y][0]
        verde = pixeles[x,y][1]
        azul = pixeles[x,y][2]
        #almaceno el promedio de rojo verde y azul
        promedio = math.floor((rojo+verde+azul)/3)
        #si el promedio es mayor de 127, coge el color negro
        if promedio > 127:
            rojo = 255
            verde = 255
            azul = 255
        #si el promedio es menor o igual a 127, coge el color blanco
        else:
            rojo = 0
            verde = 0
            azul = 0
        
        pixeles[x,y] = (rojo,verde,azul)
#Guarda la imagen        
imagen.save("jvumbral.png")
