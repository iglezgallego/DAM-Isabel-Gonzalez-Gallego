#include <stdio.h>
//Importo esta libreria para poder hacer operaciones con cadenas
#include <string.h>

int main(int argc,char *argv[]){
    
    char nombre[] = "Isabel ";
    char apellidos[] = "González-Gallego Rivera";
    
    //Para unir dos cadenas en una
    strcat(nombre,apellidos);
    printf("Mi nombre completo es: %s",nombre);
    
    return 0;
}