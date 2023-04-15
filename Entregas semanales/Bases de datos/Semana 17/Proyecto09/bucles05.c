#include <stdio.h>
//ESTRUCTURA DE CONTROL DO WHILE
int main(int argc,char *argv[]){
    //Es la unica estructura de control que finaliza con un ;
    int i = 50;
    //se ejecuta una vez y luego pregunta si se tiene que ejecutar o no
    do{
        printf("Hola me estoy ejecutando \n");
        //incremento
        i = i + 1;
    }while(i < 10);
    
    printf("\n");
    return 0;
    
}