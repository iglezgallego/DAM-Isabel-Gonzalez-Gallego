import re

##EXPRESIONES REGULARES PARA VALIDAR EMAIL
print("Introduce un numero")
email = input()
regla = r'^([\s\d]+)$'
##expreson regular que he encontrado para validar email

validacion = re.search(regla,email)

##print(validacion)
###si pone match es que es validado

if validacion:
    print("ok")
else:
    print("error")
