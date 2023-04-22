import numpy as np

coleccion = np.array(['Marta','Leticia','Sara','Ana','Bego','Patricia'])

coleccion2 = np.array(['Nazaret','Maribel','Marina','Sofia','Maricarmen','Ivan'])

#para unir arrays
juntado = np.concatenate((coleccion, coleccion2))

print(juntado)

#para separar arrays
separado = np.array_split(juntado,3)
#separarlo en 3 partes diferentes
print("Que sepas que la primera parte del partido es:")
print(separado[0])
print("la segunda parte del partido es:")
print(separado[1])
print("y que la tercera parte del partido es:")
print(separado[2])

