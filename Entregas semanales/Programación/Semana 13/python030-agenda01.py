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
    #ejecucion recursiva
    miAgenda()

miAgenda()
