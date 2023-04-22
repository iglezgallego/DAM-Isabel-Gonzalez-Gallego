import json

##LEER ARCHIVO JSON EXTERNO
archivo = open("agenda.json", 'r')

micadena = archivo.readline()
carga = json.loads(micadena)

print(type(micadena))
print(type(carga))

print(carga["pepe"])
