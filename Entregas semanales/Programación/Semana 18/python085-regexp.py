import re

##EXPRESIONES REGULARES

mitexto = "Ramiro"
#re.search parametros lo que voy a buscar y donde lo quiero buscar 
busqueda = re.search("^Ram",mitexto)
print(busqueda)
#poner if busqueda equivale a decir if busqueda == True
if busqueda:
    print("he encontrado un resultado")
else:
    print("no he encontrado ningun resultado")
    
## ^ es empieza por
## $ es acaba en
## * coincide con 0 o más repeticiones
