print("Dime tu nombre")
# con input el sistema va a esperar que intruduzcas una entrada
nombre = input()
#A continuación quiero ver si el sistema está guardando esa información
print("Hola,",nombre)

print("Dime tu edad")
edad = input()
print("Tu nombre es",nombre,"y tu edad es de",edad,"años")

edad = 15

if edad < 30:
    print("Eres una persona joven")
else:
    print("Ya no eres tan joven como antes")
    print("Que sepas que esto esta dentro del else")

print("Esto se va a ejecutar si o si, porque está fuera de la estructura IF")
