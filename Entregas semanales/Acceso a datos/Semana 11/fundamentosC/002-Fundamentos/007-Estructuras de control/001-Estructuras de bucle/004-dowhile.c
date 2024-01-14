#include <stdio.h>

int main(int argc,char *argv[]){
    int edad = 31;
    //Se ejecuta al menos una vez aunque no se cumpla
    do{
        printf("Tu edad es menor que 60 años \n");
    }while(edad < 60);
    return 0;
}