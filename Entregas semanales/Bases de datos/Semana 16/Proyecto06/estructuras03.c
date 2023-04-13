#include <stdio.h>

int main(int argc,char *argv[]){
//ESTRUCTURA DE CONTROL SWITCH
    int diadelasemana = 4;
    switch(diadelasemana){
        case 1:
            printf("Hoy es lunes que es el peor dia de la semana \n");
            break;
        case 2:
            printf("Hoy es martes que es el segundo peor dia de la semana \n");
            break;
        case 3:
            printf("Hoy es miercoles y estamos a mitad de semana \n");
            break;
        case 4:
            printf("Hoy es jueves que es casi viernes \n");
            break;
        case 5:
            printf("Hoy es viernes y casi estamos en el fin de semana \n");
            break;
        case 6:
            printf("Hoy es sabado que es el mejor dia de la semana \n");
            break;
        case 7:
            printf("Hoy es domingo y mañana ya es lunes otra vez \n");
            break;
        default:
            printf("Lo que has introducido no es un dia valido de la semana \n");
            break;
    }
    
    return 0;
    
}