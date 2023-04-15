#include <stdio.h>
//ESTRUCTURAS DE CONTROL DE BUCLE
//meto un quinto campo nuevo y no tengo que modificar casi el codigo, solo ponerle el fin del iterador un campo mas
int main(int argc,char *argv[]){
    char* agenda[10][5];
    
    agenda[0][0] = "Isabel";
    agenda[0][1] = "471258";
    agenda[0][2] = "Calle Isabel";
    agenda[0][3] = "isa@mail.com";
    agenda[0][4] = "Gonzalez";
    
    agenda[1][0] = "Marta";
    agenda[1][1] = "471414";
    agenda[1][2] = "Calle Marta";
    agenda[1][3] = "marta@mail.com";
    agenda[1][4] = "Lopez";
    
    agenda[2][0] = "Rodolfo";
    agenda[2][1] = "4712232";
    agenda[2][2] = "Calle Rodolfo";
    agenda[2][3] = "rodolfo@mail.com";
    agenda[2][4] = "Martinez";
    
    agenda[3][0] = "Isabel";
    agenda[3][1] = "471258";
    agenda[3][2] = "Calle Isabel";
    agenda[3][3] = "isa@mail.com";
    agenda[3][4] = "Garcia";
    
    agenda[4][0] = "Marta";
    agenda[4][1] = "471414";
    agenda[4][2] = "Calle Marta";
    agenda[4][3] = "marta@mail.com";
    agenda[4][4] = "Gomez";
    
    agenda[5][0] = "Rodolfo";
    agenda[5][1] = "4712232";
    agenda[5][2] = "Calle Rodolfo";
    agenda[5][3] = "rodolfo@mail.com";
    agenda[5][4] = "Rivera";
    
    
    //ESTRUCTURA FOR ANIDADA
    for(int registro=0;registro<=5;registro = registro + 1){
        for(int campo=0;campo<=4; campo=campo+1){
            printf("-%s \n",agenda[registro][campo]);
        }
        printf("\n");
    }
    printf("\n");
    return 0;
    
}