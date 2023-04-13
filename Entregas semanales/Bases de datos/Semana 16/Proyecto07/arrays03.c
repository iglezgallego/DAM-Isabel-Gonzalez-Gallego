#include <stdio.h>

int main(int argc,char *argv[]){
//ARRAYS DE DOS DIMENSIONES como si trabajaramos con tablas
    //asteriscos tiene que ver con punteros
    char* agenda[10][4];
    
    agenda[0][0] = "Isabel";
    agenda[0][1] = "471258";
    agenda[0][2] = "Calle Isabel";
    agenda[0][3] = "isa@mail.com";
    
    agenda[1][0] = "Marta";
    agenda[1][1] = "471414";
    agenda[1][2] = "Calle Marta";
    agenda[1][3] = "marta@mail.com";
    
    agenda[2][0] = "Rodolfo";
    agenda[2][1] = "4712232";
    agenda[2][2] = "Calle Rodolfo";
    agenda[2][3] = "rodolfo@mail.com";
    
    printf("La calle de Isabel es: %s \n",agenda[0][3]);
    
    printf("\n");
    
    return 0;
    
}