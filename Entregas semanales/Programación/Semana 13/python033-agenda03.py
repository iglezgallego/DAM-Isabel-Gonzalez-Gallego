##Programa agenda Isabel González-Gallego

agenda = [["nombre","telefono","email"]]

#Antes de nada, vamos a cargar los archivos que teníamos en el archivo de texto
archivo = open("agenda.txt",'r')
for i in range(1,10):
    nuevalinea = archivo.readline().split(",")
    agenda.append(nuevalinea)
#Antes de seguir, dime en que estado está la agenda
print(agenda)

def miAgenda():
    #Menu inicial
    print("Escoge tu opción")
    print("1.-Introduce nuevo registro")
    print("2.-Listar registros")
    print("3.-Buscar registro")
    opcion = input()
    if opcion == "1":
        print("Introduce el nuevo nombre en la agenda")
        nombre = input()
        print("Introduce el numero de telefono")
        telefono = input()
        print("Introduce el correo")
        correo = input()
        #antes de hacer nada más, lo metemos en la lista y la sacamos por pantalla
        agenda.append([nombre, telefono, correo])
    ##    print(agenda)
        #Guardo en un archivo de texto
        archivo = open("agenda.txt","a")
        #Transformo la información para que se pueda guardar en archivo de texto
        #Concateno con el signo + para que no lo coja como un tupla
        longaniza = nombre+","+telefono+","+correo+"\n"
        archivo.write(str(longaniza))
        archivo.close()
    if opcion == "2":
        for i in range (1,len(agenda)):
            print(agenda[i])
            
##INTENTO DE HACER LA PARTE DE BUSQUEDAS
##    if opcion == "3":
##        print("Introduce el nombre que quieres buscar")
##        buscador = input()
##        busqueda = buscador.split()
##        for i in range (1,len(agenda)):
##            if buscador == agenda([i]):
##                print (agenda([i]))

            
    #ejecucion recursiva
    miAgenda()

miAgenda()
