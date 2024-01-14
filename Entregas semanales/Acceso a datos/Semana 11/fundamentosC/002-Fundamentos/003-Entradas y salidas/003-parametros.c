#include <stdio.h>

int main(int argc,char *argv[]){
    //Le digo que le voy a dar un argumento de consola
    //De esta forma en el terminal: ./a.exe 4
    char *numero = argv[1];
    printf("El numero que has introducido es %s \n:",numero);
    return 0;
}