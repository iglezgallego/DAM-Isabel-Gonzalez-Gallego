#include <stdio.h>

int main(int argc,char *argv[]){
    //creo una cadena de 100 caracteres
    char cadena[100];
    //Creo un archivo de tipo file
    FILE *archivo;
    //Abro el archivo en modo lectura
    archivo = fopen("agenda.txt","r");
    //Mientras el archivo contenga algo con un maximo de 100 caracteres
    while(fgets(cadena,100,archivo)!=NULL){
        //muestra la cadena
        puts(cadena);
    }
    //cierro el archivo
    fclose(archivo);
    return 0;
}