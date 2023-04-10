##El metodo constructor

##Definimos propiedades (no son acciones)
class Persona:
    def __init__(self,nombre,edad,apellido,colorpelo):
        self.nombre = nombre
        self.edad = edad
        self.apellido = apellido
        self.colorpelo = colorpelo
        
##Pongo self para que reconozca las variables creadas anteriormente y defino un metodo (son acciones)
    def mePresento(self):
        print("Hola, mi nombre es "+self.nombre)
    
persona1 = Persona("Juan",0,"lopez","negro")
persona2 = Persona("Jaime",3,"Garcia","rubio")

print(persona1.nombre)
print(persona2.nombre)

##Llamo al metodo

persona1.mePresento()

##Las propiedades son publicas y se pueden cambiar como vemos a continuacion
persona1.nombre = "Jorge"
persona1.mePresento()

#del viene de delete, eliminar
del persona1

persona1.mePresento()


