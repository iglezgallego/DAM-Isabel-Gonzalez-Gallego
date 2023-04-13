//OPERADORES DE COMPARACION
#include <stdio.h>

int main(int argc,char *argv[]){
    int numero1 = 4;
    int numero2 = 3;
    // == operador de comparacion 0 si es falso y 1 si es verdadero
    //MENOR QUE
    int comparacion = numero1 < numero2;
    printf("El resultado es: %i \n",comparacion);
    //MENOR O IGUAL QUE
    int comparacion2 = numero1 <= numero2;
    printf("El resultado es: %i \n",comparacion2);
    //MAYOR QUE
    int comparacion3 = numero1 > numero2;
    printf("El resultado es: %i \n",comparacion3);
    //MAYOR O IGUAL QUE
    int comparacion4 = numero1 >= numero2;
    printf("El resultado es: %i \n",comparacion4);
    
    return 0;
    
}