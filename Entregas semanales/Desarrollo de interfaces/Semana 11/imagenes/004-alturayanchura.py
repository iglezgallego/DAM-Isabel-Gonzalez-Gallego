from PIL import Image
import os

carpeta = "001-crudo"
carpetasalida = "002-procesadas"

archivos = os.listdir(carpeta)

##Para cada una de las imagenes
for archivo in archivos:
    ##Quiero unir la carpeta con el archivo
    imagen = os.path.join(carpeta,archivo)
    print(imagen)
    ##Abro la imagen
    miimagen = Image.open(imagen)

    anchura = miimagen.width
    altura = miimagen.height
    
    ##Recortar la imagen para hacerla cuadrada

    ##Si la anchura es mayor que la altura
    if anchura > altura:
        caja = (
             anchura/2-altura/2,
             0,
             anchura/2+altura/2,
             altura
             )

    ##si la altura es mayor que la anchura         
    else:
        caja = (
             0,
             altura/2-anchura/2,
             anchura,
             altura/2+anchura/2
             )
        
    cortada = miimagen.crop(caja)
    escalada = cortada.resize((512,512))
    escalada.save(carpetasalida+"/"+archivo)
