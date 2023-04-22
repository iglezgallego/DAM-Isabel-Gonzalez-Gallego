#Importo la libreria PIL para trabajar con imagenes
from PIL import Image

imagen = Image.open("isabel.jpg")
pixeles = imagen.load()
#proporciona informacion sobre la imagen
print(imagen.size)
#leer el color del primer pixel
print(pixeles[0,0])
#cambio el color del pixel y guardo la imagen
pixeles[0,0] = (255,255,255)
imagen.save("isabelguardado.png")
