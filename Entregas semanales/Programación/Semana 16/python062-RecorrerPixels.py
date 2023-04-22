from PIL import Image

imagen = Image.open("isabel.jpg")
pixeles = imagen.load()
#proporciona informacion sobre la imagen
print(imagen.size)
#leer el color del primer pixel
print(pixeles[0,0])
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
        #invierto los colores
        rojo = 255 - rojo
        verde = 255 - verde
        azul = 255 - azul
        #reasigno colores
        pixeles[x,y] = (rojo, verde, azul)
        
print(anchura)

imagen.save("isabelguardado.png")
