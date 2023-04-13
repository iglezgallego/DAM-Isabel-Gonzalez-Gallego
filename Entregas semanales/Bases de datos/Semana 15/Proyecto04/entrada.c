#include <stdio.h>

int main(int argc,char *argv[]){
    printf("Selecciona una tecla: \n");
    //con esta instruccion el usuario puede hacer una entrada de un caracter
    char seleccion = getchar();
    //imprime la entrada del usuario, que es una c por ser un solo caracter
    printf("La tecla que has seleccionado es %c \n",seleccion);
    return 0;
    
}
    
