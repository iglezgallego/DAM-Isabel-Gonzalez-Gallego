archivo = open("miarchivo.txt", 'r')

##te lee la primera línea que ya estaba escrita
##print(archivo.readline())

##te lee la segunda línes que acabamos de escribir
##print(archivo.readline())

##Te lee todo el documento entero
print(archivo.read())

##contador = 0
#En esta caso, con una estructura for,  leemos las primeras 10 lineas
##for i in range(0,10):
##    contador += 1
##    print(archivo.readline())
##    if archivo.readline() == "" and contador > 3:
##        break
        
        
#No funciona bien pero sabemos que se puede meter un if dentro de un for
