'''
Programa calculadora
(c) 2023 Isabel González-Gallego Rivera
v0.1
'''
##Bienvenida al programa
print("Bienvenido al programa calculadora")
print("Introduce tu nombre")
nombre = input()
print("Hola,",nombre,"te doy la bienvenida al programa calculadora")

##encandenamos print para escribirlo menos veces con +
##Indica la operacion
print("Ahora elige la operación que vas a realizar"+
      "\n1.Suma"+
      "\n2.Resta"+
      "\n3.Multiplicación"+
      "\n4.División"+
      "")
operacion = int(input())
print("La operación que has elegido es",operacion)

##Introduce los numeros
print("Ahora introduce un número")
numero1=int(input())

print("Ahora introduce otro número")
numero2=int(input())

##Realiza la operacion
if operacion == 1:
    print("El resultado es:",(numero1+numero2))

if operacion == 2:
    print("El resultado es:",(numero1-numero2))

if operacion == 3:
    print("El resultado es:",(numero1*numero2))

if operacion == 4:
    print("El resultado es:",(numero1/numero2))
    

