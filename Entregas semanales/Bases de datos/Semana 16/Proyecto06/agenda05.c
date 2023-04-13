/*
Programa agenda
v1
por Isabel González-Gallego 
*/

#include <stdio.h>
//declaro las constantes
#define PI 3.1416
#define NOMBREPROGRAMA "Programa agenda"
#define VERSION "1.2"
#define AUTOR "Isabel Gonzalez-Gallego"

int main(int argc,char *argv[]){
    //Mensaje de bienvenida
    //Encadenamos en el print las constantes
    printf("%s v%s \n",NOMBREPROGRAMA, VERSION);
    printf("por %s \n",AUTOR);
    printf("Selecciona una opcion: \n");
    printf("\t 1 - Listado de registro: \n");
    printf("\t 2 - Introducir un registro: \n");
    printf("\t 3 - Eliminar un registro: \n");
    printf("\t 4 - Buscar un registro: \n");
    printf("\t 5 - Actualizar un registro: \n");
    printf("Indica tu opcion: \n");
    //instruccion para introducir un caracter
    char opcion = getchar();
    printf("La opcion que has seleccionado es: %c \n",opcion);
    //Vamos a decidir que hacemos en cada parte del programa
    switch(opcion){
        case '1':
            printf("A continuacion te ofrezco un listado de registros:\n");
            break;
        case '2':
            printf("A continuacion vamos a introducir un registro:\n");
            break;
        case '3':
            printf("A continuacion vamos a eliminar un registro:\n");
            break;
        case '4':
            printf("A continuacion buscamos entre los regristros:\n");
            break;
        case '5':
            printf("A continuacion vamos a actualizar los datos del programa:\n");
            break;
        default:
            printf("La opcion que has seleccionado no es valida \n");
            break;
            
    }
    printf("Finalizando la ejecucion del programa... \n");
    printf("\n");
    return 0;
    
}
    
