import json

#la estructura es "clave":"valor",
micadena = '{"isa":"isa@correo.com","patri":"patri@correo.com","leti":"leti@correo.com","sara":"sara@correo.com","ana":"ana@correo.com"}'
carga = json.loads(micadena)
#micadena es un string y carga un diccionario
print(type(micadena))
print(type(carga))
#le doy una clave y me devuelve su resultado
print(carga["patri"])

##los intems en un diccionario se obtienen a traves de una clave y por tanto estan desordenados
##el diccionario tiene un velocidad de lectura muy inferior que los arrays pero los indices pueden ser asociativos en vez de numericos
