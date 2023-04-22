from PIL import Image
import math

imagenvertical = Image.open("caras/vertical.png")
pixelesvertical = imagenvertical.load()

imagen = Image.open("caras/cara1.png")
pixeles = imagen.load()

##pintar en la imagen
imagenresultado = Image.open("caras/resultado.png")
pixelesresultado = imagenresultado.load()

imagenvertical = Image.open("caras/vertical.png")
pixelesvertical = imagenvertical.load()

imagenhorizontal = Image.open("caras/horizontal.png")
pixeleshorizontal = imagenhorizontal.load()


imagendiagonal1 = Image.open("caras/diagonal1.png")
pixelesdiagonal1 = imagendiagonal1.load()


imagendiagonal2 = Image.open("caras/diagonal2.png")
pixelesdiagonal2 = imagendiagonal2.load()


altura = imagen.size[1]
anchura = imagen.size[0]

#voy a asumir que cojo el pixel que está en 0

numeropixelesverticales = 0
numeropixeleshorizontales = 0
numeropixelesdiagonales1 = 0
numeropixelesdiagonales2 = 0

# //////////ESTO ES VERTICAL //////////
#CUADRUPE BUCLE FOR PARA RECORRER LA IMAGEN EN HORIZONTAL Y EN VERTICAL
for superx in range (0,247):
    for supery in range (0,247):
        #voy a recorrer los primeros 8 pixeles de la imagen
        suma = 0
        valor = 0
        for x in range(0,7):
            for y in range(0,7):
                #este if obtiene la mitad de resultados, 3 canal de transparencia, por lo que solo valora si el pixel en el que está tiene color
                #resultado por debajo de cero equivale a 0
                if pixelesvertical[x,y][3] != 0:
                    valor = 0
                    #con este if evito que me salgan numeros negativos, saldrán ceros
                    valor = pixeles[superx+x,supery+y][0]-pixelesvertical[x,y][0]
                    ##print(valor)
                    suma += valor
        if abs(suma) < 1000:
            #resumo todo a un solo valor, un solo cero
            #print("Pixel"+str(superx)+","+str(supery)+" - La suma es: "+str(abs(suma)))
            #estos son los pixeles verticales que ha encontrado el sistema en la foto
            pixelesresultado[superx+x,supery+y] = (0,0,0)
            numeropixelesverticales += 1
        else:
            pixelesresultado[superx+x,supery+y] = (255,255,255)
#sacamos el numero de total de verticales, horizontales, etc y sacar una proporcion
print("El numero de pixeles verticales es: "+str(numeropixelesverticales))

# //////////ESTO ES VERTICAL //////////

# //////////ESTO ES HORIZONTAL //////////

for superx in range (0,247):
    for supery in range (0,247):
        #voy a recorrer los primeros 8 pixeles de la imagen
        suma = 0
        valor = 0
        for x in range(0,7):
            for y in range(0,7):
                #este if obtiene la mitad de resultados, 3 canal de transparencia, por lo que solo valora si el pixel en el que está tiene color
                #resultado por debajo de cero equivale a 0
                if pixeleshorizontal[x,y][3] != 0:
                    valor = 0
                    #con este if evito que me salgan numeros negativos, saldrán ceros
                    valor = pixeles[superx+x,supery+y][0]-pixeleshorizontal[x,y][0]
                    ##print(valor)
                    suma += valor
        if abs(suma) < 1000:
            #resumo todo a un solo valor, un solo cero
            #print("Pixel"+str(superx)+","+str(supery)+" - La suma es: "+str(abs(suma)))
            #estos son los pixeles verticales que ha encontrado el sistema en la foto
            pixelesresultado[superx+x,supery+y] = (0,0,0)
            numeropixeleshorizontales += 1
        else:
            pixelesresultado[superx+x,supery+y] = (255,255,255)
#sacamos el numero de total de verticales, horizontales, etc y sacar una proporcion
print("El numero de pixeles horizontales es: "+str(numeropixeleshorizontales))

# //////////ESTO ES HORIZONTAL //////////

# //////////ESTO ES DIAGONAL1 //////////

for superx in range (0,247):
    for supery in range (0,247):
        #voy a recorrer los primeros 8 pixeles de la imagen
        suma = 0
        valor = 0
        for x in range(0,7):
            for y in range(0,7):
                #este if obtiene la mitad de resultados, 3 canal de transparencia, por lo que solo valora si el pixel en el que está tiene color
                #resultado por debajo de cero equivale a 0
                if pixelesdiagonal1[x,y][3] != 0:
                    valor = 0
                    #con este if evito que me salgan numeros negativos, saldrán ceros
                    valor = pixeles[superx+x,supery+y][0]-pixelesdiagonal1[x,y][0]
                    ##print(valor)
                    suma += valor
        if abs(suma) < 1000:
            #resumo todo a un solo valor, un solo cero
            #print("Pixel"+str(superx)+","+str(supery)+" - La suma es: "+str(abs(suma)))
            #estos son los pixeles verticales que ha encontrado el sistema en la foto
            pixelesresultado[superx+x,supery+y] = (0,0,0)
            numeropixelesdiagonales1 += 1
        else:
            pixelesresultado[superx+x,supery+y] = (255,255,255)
#sacamos el numero de total de verticales, horizontales, etc y sacar una proporcion
print("El numero de pixeles diagonal1 es: "+str(numeropixelesdiagonales1))

# //////////ESTO ES DIAGONAL 1 //////////

# //////////ESTO ES DIAGONAL 2 //////////

for superx in range (0,247):
    for supery in range (0,247):
        #voy a recorrer los primeros 8 pixeles de la imagen
        suma = 0
        valor = 0
        for x in range(0,7):
            for y in range(0,7):
                #este if obtiene la mitad de resultados, 3 canal de transparencia, por lo que solo valora si el pixel en el que está tiene color
                #resultado por debajo de cero equivale a 0
                if pixelesdiagonal2[x,y][3] != 0:
                    valor = 0
                    #con este if evito que me salgan numeros negativos, saldrán ceros
                    valor = pixeles[superx+x,supery+y][0]-pixelesdiagonal2[x,y][0]
                    ##print(valor)
                    suma += valor
        if abs(suma) < 1000:
            #resumo todo a un solo valor, un solo cero
            #print("Pixel"+str(superx)+","+str(supery)+" - La suma es: "+str(abs(suma)))
            #estos son los pixeles verticales que ha encontrado el sistema en la foto
            pixelesresultado[superx+x,supery+y] = (0,0,0)
            numeropixelesdiagonales2 += 1
        else:
            pixelesresultado[superx+x,supery+y] = (255,255,255)
#sacamos el numero de total de verticales, horizontales, etc y sacar una proporcion
print("El numero de pixeles diagonal2 es: "+str(numeropixelesdiagonales2))

# //////////ESTO ES DIAGONAL 2 //////////
        
imagen.save("caras/cara1guardado.png")
imagenresultado.save("caras/resultadohorizontal.png")
