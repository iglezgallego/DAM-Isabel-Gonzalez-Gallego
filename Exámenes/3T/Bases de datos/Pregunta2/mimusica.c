/*
Programa mis cds musicales
v1
por Isabel González-Gallego 
*/

#include <stdio.h>
#include <string.h>
//declaro las constantes
#define PI 3.1416
#define NOMBREPROGRAMA "Mis cds musicales"
#define VERSION "1.0"
#define AUTOR "Isabel Gonzalez-Gallego"

int main(int argc,char *argv[]){
    
    //Creo una estructura para una lista de musica y le introduzco tres registros
    struct RegistroAgenda{
        
        char titulo[50];
        char artista[50];
        char anio[50];
        char genero[50];
        
    };
    
    struct RegistroAgenda agenda[100];
    
    strcpy(agenda[0].titulo,"Motomami");
    strcpy(agenda[0].artista,"Rosalia");
    strcpy(agenda[0].anio,"2022");
    strcpy(agenda[0].genero,"Pop");
    
    
    strcpy(agenda[1].titulo,"Deltoya");
    strcpy(agenda[1].artista,"Extremoduro");
    strcpy(agenda[1].anio,"1992");
    strcpy(agenda[1].genero,"Rock");
   
    
    strcpy(agenda[2].titulo,"Vuelve");
    strcpy(agenda[2].artista,"Ricky Martin");
    strcpy(agenda[2].anio,"1998");
    strcpy(agenda[2].genero,"Latina");
    
    
    
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
                if(strcmp(agenda[i].titulo,"")){
                    printf("El titulo es: %s \n",agenda[i].titulo);
                    printf("El artista es: %s \n",agenda[i].artista);
                    printf("El año de lanzamiento es: %s \n",agenda[i].anio);
                    printf("El genero musical es: %s \n",agenda[i].genero);
                    
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
    
