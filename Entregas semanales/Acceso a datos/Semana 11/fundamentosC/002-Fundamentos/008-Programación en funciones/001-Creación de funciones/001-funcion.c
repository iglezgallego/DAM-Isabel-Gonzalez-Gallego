#include <stdio.h>

//declaro una nueva función antes de llamarla
int sumar(){
    int operador1 = 4;
    int operador2 = 3;
    int suma = operador1 + operador2;
    return suma;
}

//Esta funcion la tenemos por defecto en C
int main(int argc,char *argv[]){
    
    //aquí llamo a la función dentro de un printf
    printf("La suma es: %i \n",sumar());
    
    return 0;
}