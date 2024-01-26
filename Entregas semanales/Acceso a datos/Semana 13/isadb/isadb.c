#include <stdio.h>
#include <string.h>
//libreria que permite acceder a datos horarios
//#include <time.h>

//Uso parámetros en la función
int main(int argc,char *argv[]){
    //printf("Hola");
    //Escribir en un archivo de texto
    FILE *archivo;
    char *operacion = argv[1];
    char *basededatos = argv[2];
    char *coleccion = argv[3];
    
    /*
        Uso:
        jvbd.exe [operacion] [basededatos] [coleccion] [documento] [contenido]
    
    */
    
    //PARA LEER LOS DATOS DE LOS ARCHIVOS
    //Como argumentos que tengo que pasar, tengo la operacion, la bbdd, el nombre de la coleccion y el nombre del documento sin el.json, 4 argumentos
    if(strcmp(operacion,"select") == 0){
        //la ruta tiene que existir para el caso select
        char *documento = argv[4];
        char ruta[100];
        //Para concatenar los argumentos
        strcpy(ruta,"db/");
        strcat(ruta,basededatos);
        strcat(ruta,"/");
        strcat(ruta,coleccion);
        strcat(ruta,"/");
        strcat(ruta,documento);
        strcat(ruta,".json");
        
        //Abro el archivo en el modo read
        archivo = fopen(ruta,"r");
        printf("te doy datos:\n");
        char linea[1024];
        while(fgets(linea,sizeof(linea),archivo) != NULL){
            printf("Linea: %s",linea);
        }
        
    //PARA INSERTAR UN NUEVO DATO  
    //Como argumentos que tengo que pasar, tengo la operacion, la bbdd, el nombre de la coleccion, el nombre del documento y el contenido del documento, 5 argumentos
    }else if(strcmp(operacion,"insert") == 0){
        //El documento existe para el caso insert
        char *documento = argv[4];
        char ruta[100];
        //Para concatenar los argumentos
        strcpy(ruta,"db/");
        strcat(ruta,basededatos);
        strcat(ruta,"/");
        strcat(ruta,coleccion);
        strcat(ruta,"/");
        strcat(ruta,documento);
        strcat(ruta,".json");
        
        //Abro el archivo en el modo write
        archivo = fopen(ruta,"w");
        char *texto = argv[5];
        fputs(strcat(texto,"\n"),archivo);
        fclose(archivo);
        
    //PARA CREAR UNA NUEVA COLECCION/CARPETA
    //Como argumentos que tengo que pasar, tengo la operacion, la bbdd, el nombre de la coleccion que quiero crear, 3 argumentos
    }else if(strcmp(operacion,"create_collection") == 0){
        //Crear nueva carpeta con mkdir
        char rutacoleccion[100];
        //Para concatenar los argumentos
        strcpy(rutacoleccion,"db/");
        strcat(rutacoleccion,basededatos);
        strcat(rutacoleccion,"/");
        strcat(rutacoleccion,coleccion);
        //si la ruta coleccion con permisos 0777
        if(mkdir(rutacoleccion,0777) == 0){
            printf("ok");
        }else{
            printf("error");
        }
        
    }else{
        printf("operación no válida");
    }
    
    return 0;
}