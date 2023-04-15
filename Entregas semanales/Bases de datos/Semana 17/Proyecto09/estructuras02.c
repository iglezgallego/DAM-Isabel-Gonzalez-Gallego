#include <stdio.h>
//para poder usar strcpy hay que incluir la libreria siguiente
#include <string.h>

int main(int argc,char *argv[]){
//ESTRUCTURAS antecesora a programacion orientada a objetos
    //definir la estructura
    struct RegistroAgenda{
        //aqui escribo los campos que necesito usar
        char nombre[50];
        char apellidos[50];
        char correo[50];
        char telefono[50];
        char direccion[50];
        
    };
    //COMBINAR ARRAYS CON ESTRUCTURAS y FOR
    //creamos una coleccion de 100 estructuras
    struct RegistroAgenda agenda[100];
    
    strcpy(agenda[0].nombre,"Isabel");
    strcpy(agenda[0].apellidos,"Gonzalez");
    
    strcpy(agenda[1].nombre,"Juana");
    strcpy(agenda[1].apellidos,"Garcia");
    
    strcpy(agenda[2].nombre,"Rita");
    strcpy(agenda[2].apellidos,"Ruiz");
    
    for(int i=0; i<3; i=i+1){
        printf("El nombre es: %s \n",agenda[i].nombre);
        printf("El apellido es: %s \n",agenda[i].apellidos);
    }
    
        
    printf("\n");
    return 0;
    
}