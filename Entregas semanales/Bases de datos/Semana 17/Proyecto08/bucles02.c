#include <stdio.h>
//ESTRUCTURAS DE CONTROL DE BUCLE
//el bucle for nos sirve para iterar dentro de arrays
int main(int argc,char *argv[]){
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
    
    agenda[3][0] = "Isabel";
    agenda[3][1] = "471258";
    agenda[3][2] = "Calle Isabel";
    agenda[3][3] = "isa@mail.com";
    
    agenda[4][0] = "Marta";
    agenda[4][1] = "471414";
    agenda[4][2] = "Calle Marta";
    agenda[4][3] = "marta@mail.com";
    
    agenda[5][0] = "Rodolfo";
    agenda[5][1] = "4712232";
    agenda[5][2] = "Calle Rodolfo";
    agenda[5][3] = "rodolfo@mail.com";
    
    
    //ESTRUCTURA FOR inicio, fin e incremento
    for(int registro=0;registro<=5;registro = registro + 1){
        printf("Nombre: %s \n Telefono: %s \n Calle: %s \n Email: %s \n \n", agenda[registro][0], agenda[registro][1], agenda[registro][2], agenda[registro][3]);
    }
    printf("\n");
    return 0;
    
}