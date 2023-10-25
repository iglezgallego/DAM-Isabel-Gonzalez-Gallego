from PIL import Image

#creo una nueva imagen con el formado RGBA
img = Image.new('RGBA',(30,30), color = 'green')
#en 0,0 quiero un pixel el color azul
img.putpixel((0,0),(0,0,255,255))
    
img.save('miimagen.png')
