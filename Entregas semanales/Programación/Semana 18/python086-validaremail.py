import re

##EXPRESIONES REGULARES PARA VALIDAR EMAIL
print("Escribe tu correo email")
email = input()
regla = r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,7}\b'
##expreson regular que he encontrado para validar email

validacion = re.search(regla,email)

##print(validacion)
###si pone match es que es validado

if validacion:
    print("Es un email correcto")
else:
    print("No es un email")
