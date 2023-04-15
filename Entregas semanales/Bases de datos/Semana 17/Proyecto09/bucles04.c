#include <stdio.h>
//ESTRUCTURA DE CONTROL WHILE
int main(int argc,char *argv[]){
    //declarar el inicio fuera de la estructura, antes de escribirla
    //CTRL + C para que el programa se detenga si entro en un bucle infinito
    int i =0;
    
    while(i < 10){
        printf("El programa esta funcionando \n");
        i = i + 1; 
        //sumo un valor a i cada vez para controlar el bucle
    }
    
    printf("\n");
    return 0;
    
}