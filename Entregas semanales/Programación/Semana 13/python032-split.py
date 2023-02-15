archivo = open("agenda.txt",'r')

linea = archivo.read()
print(linea)
#Convierto el string del archivo en una lista
partido = linea.split(",")

#Saco el primer elemento por pantalla
#print(partido[0])

#saco la lista entera por pantalla
print(partido)
