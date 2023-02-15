##Programa agenda Isabel González-Gallego

agenda = [["nombre","telefono","email"]]

def miAgenda():
    print("Introduce el nuevo nombre en la agenda")
    nombre = input()
    print("Introduce el numero de telefono")
    telefono = input()
    print("Introduce el correo")
    correo = input()
    #antes de hacer nada más, lo metemos en la lista y la sacamos por pantalla
    agenda.append([nombre, telefono, correo])
    print(agenda)
    #Guardo en un archivo de texto
    archivo = open("agenda.txt","a")
    #Transformo la información para que se pueda guardar en archivo de texto
    #Concateno con el signo + para que no lo coja como un tupla
    longaniza = nombre+","+telefono+","+correo+"\n"
    archivo.write(str(longaniza))
    #cierro el recurso
    archivo.close()
    #ejecucion recursiva
    miAgenda()

miAgenda()
