##defino una clase que es una superclase superior
class Animal:
    def __init__(self, altura):
        self.altura = altura
    def come(self):
        print("Este animal tiene que comer para vivir")

##defino una clase que es una superclase
class Mamifero(Animal):
    def __init__(self,edad):
        self.edad = edad
    def mama(self):
        print("Este animal mama al nacer")
        
#Vamos a indicar que Gato deriva de Mamifero
        
class Gato(Mamifero):
    ##defino el metodo constructor
    ##self sirve para discriminar si estoy hablando de mi mismo o hace referencia a un parámetro global que viene de fuera de la clase
    def __init__(self,color):
        self.color = color

    def maulla(self):
        print("El gato está maullando")

ciri = Gato("blanco y negro")
ciri.maulla()
#Heredada Mamifero de Animal y Gato de Mamifero
ciri.mama()
ciri.come()
