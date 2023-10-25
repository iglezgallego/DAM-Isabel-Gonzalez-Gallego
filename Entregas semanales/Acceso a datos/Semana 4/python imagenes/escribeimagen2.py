from PIL import Image

#cargo la imagen
img = Image.new('RGBA',(30,30), color = 'green')

texto = "Magdalena Carmen Frida Kahlo Calderón (Coyoacán, Ciudad de México, 6 de julio de 1907-Coyoacán, Ciudad de México, 13 de julio de 1954),  conocida como Frida Kahlo, fue una pintora mexicana. Su obra gira temáticamente en torno a su biografía y a su propio sufrimiento. Fue autora de 150 obras, principalmente autorretratos, en los que proyectó sus dificultades por sobrevivir. También es considerada como un icono pop de la cultura de México."
x = 0
y = 0
#ir letra a letra del spring
for letra in texto:
    print(letra)
    #ord para obtener el codigo ascii de la letra
    #va a poner cada una de las letras del texto en un pixel de la imagen
    img.putpixel((x,y),(ord(letra),0,0,255))
    x = x+1
    #si la x es mayor que 30
    if x == 30:
        #la posicion horizontal vuelve a ser cero
        x = 0
        #y la posicion vertical salta una línea
        y = y + 1
    
img.save('miimagen.png')


