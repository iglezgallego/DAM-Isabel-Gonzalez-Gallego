#include <stdio.h>

int main(int argc,char *argv[]){
//OPERADORES
    // = asigna un valor a una variable
    int numero1 = 4;
    int numero2 = 3;
    // 4 entre 3, cabe a 1 **Y SOBRA 1**
    float numero3 = 4;
    float numero4 = 3;
    
    //OPERADORES ARITMETICOS
    //SUMA
    int resultado = numero1 + numero2;
    printf("El resultado de la suma es: %i \n",resultado);
    //RESTA
    int resultado2 = numero1 - numero2;
    printf("El resultado de la resta es: %i \n",resultado2);
    //MULTIPLICACIÓN
    int resultado3 = numero1 * numero2;
    printf("El resultado de la multiplicacion es: %i \n",resultado3);
    //DIVISION tenemos que poner float para los decimales
    float resultado4 = numero3 / numero4;
    printf("El resultado de la division es: %f \n",resultado4);
    //RESTO ENTERO DE LA DIVISION
    int resultado5 = numero1 % numero2;
    printf("El resto entero de la division es: %i \n",resultado5);
    
    
    
    return 0;
    
}