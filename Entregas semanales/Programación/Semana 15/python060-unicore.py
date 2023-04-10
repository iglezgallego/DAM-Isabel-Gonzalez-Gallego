import time

#este programa solo va a usar uno de los nucleos de procesamiento
numero = 0.0000000785
contador = 0

def bucle(contador,numero):
    contador += 1
    if contador % 1000 == 0:
        print("ok la cosa va bien")
    numero = numero*1.2
    time.sleep(0.01)
    bucle(contador,numero)
    
time.sleep(1)
bucle(contador,numero)
