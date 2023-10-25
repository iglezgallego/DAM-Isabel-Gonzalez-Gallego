from PIL import Image

im = Image.open(r"textoprueba1.png")
print(im)
pixeles = im.getdata()
print (pixeles)
cadena = ""

#imprime los pixeles de la imagen como una tupla
for pixel in pixeles:
    #print(pixel)
    #imprime el primer pixel de la tupla
    #dime lo contrario del ord() que es chr()
    print(chr(pixel[0]))
    #para juntar las letras sueltas en frases
    cadena = cadena + (chr(pixel[0]))
    
print (cadena)
    
    

