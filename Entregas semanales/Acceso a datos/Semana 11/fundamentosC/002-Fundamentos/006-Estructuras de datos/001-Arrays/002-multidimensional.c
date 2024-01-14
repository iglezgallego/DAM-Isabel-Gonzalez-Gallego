#include <stdio.h>

int main(int argc,char *argv[]){
    
    char* agenda[10][4];
    
    agenda[0][0] = "Isabel";
    agenda[0][1] = "Gonzalez";
    agenda[0][2] = "12345";
    agenda[0][3] = "iglez@gmail.com";
    
    agenda[1][0] = "Rosa";
    agenda[1][1] = "Sanchez Rivera";
    agenda[1][2] = "98865";
    agenda[1][3] = "rosa@gmail.com";
    
    printf("El correo del segundo registro de la agenda es: %s \n ",agenda[1][3]);
    
    return 0;
}