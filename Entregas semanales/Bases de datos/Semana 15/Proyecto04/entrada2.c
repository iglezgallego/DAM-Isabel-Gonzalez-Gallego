#include <stdio.h>

int main(int argc,char *argv[]){
    printf("Introduce un nombre: \n");
    //Entrada de una cadena de caracteres
    char nombre[100];
    //Escanea la entrada del usuario y le decimos que esta en formato string y la mete dentro de nombre
    scanf("%s",nombre);
    //imprime la entrada del usuario, que es una s por ser varios caracteres
    printf("El nombre que has introducido es %s \n",nombre);
    return 0;
    
}
    
