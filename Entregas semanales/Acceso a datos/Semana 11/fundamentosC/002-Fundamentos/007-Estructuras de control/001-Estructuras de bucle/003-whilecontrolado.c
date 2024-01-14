#include <stdio.h>

int main(int argc,char *argv[]){
    int dia = 1;
    while(dia < 31){
        printf("Hoy es el dia: %i del mes\n ",dia);
        dia++;
        //Al añadir el incremento controlamos el bucle
    }
    return 0;
}