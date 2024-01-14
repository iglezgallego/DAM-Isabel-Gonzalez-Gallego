#include <stdio.h>

int main(int argc,char *argv[]){
    //Para realizar una salida por consola
    printf("Elige un numero entre el 0 y 9:");
    //Creo una entrada
    char numero = getchar();
    printf("El caracter que has elegido es: %c \n",numero);
    
    return 0;
}