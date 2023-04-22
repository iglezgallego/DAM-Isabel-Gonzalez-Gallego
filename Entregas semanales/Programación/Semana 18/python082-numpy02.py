import numpy as np

coleccion = np.array(['Marta','Leticia','Sara','Ana','Bego','Patricia'])

coleccion2 = np.array(['Nazaret','Maribel','Marina','Sofia','Maricarmen','Ivan'])

#para unir arrays
juntado = np.concatenate((coleccion, coleccion2))

print(juntado)
