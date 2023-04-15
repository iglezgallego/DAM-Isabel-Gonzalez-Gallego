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
    //las estructuras no son estructuras de control por eso tiene que acabar con ;
    
    struct RegistroAgenda registro1;
    strcpy(registro1.nombre, "Isabel");
    strcpy(registro1.apellidos, "Gonzalez");
    
    struct RegistroAgenda registro2;
    strcpy(registro2.nombre, "Juana");
    strcpy(registro2.apellidos, "Garcia");
    
    struct RegistroAgenda registro3;
    strcpy(registro3.nombre, "Rita");
    strcpy(registro3.apellidos, "Ruiz");
    
    //Vamos a devolver los registros
    printf("El nombre del primer registro es: %s \n",registro1.nombre);
    printf("El apellido del primer registro es: %s \n",registro1.apellidos);
        
    printf("\n");
    return 0;
    
}