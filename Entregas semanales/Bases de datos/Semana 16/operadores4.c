//OPERADORES LOGICOS
#include <stdio.h>

int main(int argc,char *argv[]){
    int numero1 = 4;
    int numero2 = 3;
    int numero3 = 2;
    int numero4 = 6;
    //AND se tienen que cumplir las dos para ser cierto
    int comparacion = numero1 < numero2 && numero3 < numero4;
    printf("El resultado es: %i \n",comparacion);
    //OR se tienen que cumplir una de las dos para ser cierto
    int comparacion2 = numero1 < numero2 || numero3 < numero4;
    printf("El resultado es: %i \n",comparacion2);
    
    
    return 0;
    
}