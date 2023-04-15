/*
Programa agenda
v1
por Isabel González-Gallego 
*/

#include <stdio.h>
#include <string.h>
//declaro las constantes
#define PI 3.1416
#define NOMBREPROGRAMA "Programa agenda"
#define VERSION "1.6"
#define AUTOR "Isabel Gonzalez-Gallego"

int main(int argc,char *argv[]){
    
    //Creo una estructura y le pongo un par de registros
    struct RegistroAgenda{
        
        char nombre[50];
        char apellidos[50];
        char correo[50];
        char telefono[50];
        char direccion[50];
        
    };
    
    struct RegistroAgenda agenda[100];
    
    strcpy(agenda[0].nombre,"Isabel");
    strcpy(agenda[0].apellidos,"Gonzalez");
    
    strcpy(agenda[1].nombre,"Juana");
    strcpy(agenda[1].apellidos,"Garcia");
    
    strcpy(agenda[2].nombre,"Rita");
    strcpy(agenda[2].apellidos,"Ruiz");
    
    
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
            for(int i=0; i<10; i=i+1){
                //si el nombre no es igual a nada imprime, es decir, si el nombre tiene algo imprimelo y si está vacio no lo imprimas
                if(strcmp(agenda[i].nombre,"")){
                    printf("El nombre es: %s \n",agenda[i].nombre);
                    printf("El apellido es: %s \n",agenda[i].apellidos);
                }
            }
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
    
