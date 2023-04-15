#include <stdio.h>
//libreria que incluye la funcion de sleep
#include <unistd.h>
//libreria que incluye la funcion de rand
#include <stdlib.h>
#include <string.h>
#include <time.h>

//pongo las variables fuera de la funcion principal porque queremos que este visible en las dos funciones 
int edad;
float posx;
float posy;
float posz;
char* identificador;
char ruta[100];

//la funcion de bucle tiene que aparecer antes de que se llame en la funcion principal
int bucle(){
    printf("estas dentro del bucle \n");
    //creo un bucle infinito controlado con sleep para que se ejecute una vez por segundo
    while(1){
        edad = edad + 1;
        //cada vez que se ejecute el bucle la posicion cambie de forma aleatoria
        posx = posx + ((float)((float)(rand()%100)/100)-0.5)*10;
        posy = posy + ((float)((float)(rand()%100)/100)-0.5)*10;
        //pongo un float para que el numero aleatorio sea un numero decimal de -0.5 a +0.5
        //printf("Un numero aleatorio es %f \n",(float)((float)(rand()%100)/100)-0.5);
        printf("Coordenadas son: x=%f, y=%f \n",posx,posy,posz);
        printf("ejecutando.. \n");
        printf("El identificador de esta persona es %s \n",identificador);
        printf("Tienes una edad de %i segundos\n",edad);
        printf("\n");
        
        //para escribir dentro de un archivo
        FILE *fp;
        fp = fopen(ruta, "w+");
        fprintf(fp, "%f,%f,%f\n",posx,posy);
        fclose(fp);
        
        sleep(1);
    }
    return 0;
}
//para que este programa acepte parámetros
int main(int argc,char *argv[]){
    
    printf("Hola mundo \n");
    //Voy a dar la condicones de inicio
    edad = 0;
    posx = 256;
    posy = 256;
    posz = 0;
    //identificador = argv[1];
    
    //ponemos el identificador como un numero aleatorio
    char aleatorio[50];
    sprintf(aleatorio, "%ld", (unsigned long)time(NULL));
    identificador = aleatorio;
    
    strcpy(ruta,"registros/");
    //para concatenar
    strcat(ruta,identificador);
    strcat(ruta,".txt");
    
    printf("La edad de esta persona es %i \n",edad);
    bucle();
    return 0;
}
