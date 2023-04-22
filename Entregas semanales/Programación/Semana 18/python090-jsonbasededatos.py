import json

##LEER ARCHIVO JSON EXTERNO RECUPERADO DE BASE DE DATOS nombresninos.json
##la exportacion desde phpmyadmin no se ha hecho correctamente, he cogido otro archivo json

archivo = open("ejemplo.json", 'r')

micadena = archivo.read().replace('\n','')
carga = json.loads(micadena)

print(type(micadena))
print(type(carga))

print(carga['glossary']['GlossDiv']['title'])
