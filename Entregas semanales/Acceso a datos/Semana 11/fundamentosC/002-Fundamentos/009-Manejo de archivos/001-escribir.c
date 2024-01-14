#include <stdio.h>

int main(int argc,char *argv[]){
    
    //creo una archivo de tipo file
    FILE *archivo;
    //Abro el archivo en modo escribir
    archivo = fopen("agenda.txt","w");
    //Imprimir en un archivo
    fprintf(archivo,"Esto es un texto de prueba \n");
    //Cerrar el archivo
    fclose(archivo);
    
    return 0;
}