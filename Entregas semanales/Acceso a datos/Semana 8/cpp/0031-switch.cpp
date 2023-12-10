#include <iostream>
using namespace std;

int main(){
    int diadelasemana = 7;
    //hace lo mismo que if else, es una versión más clara y menos repetitiva
    switch(diadelasemana){ 
        case 1:
            cout << "Hoy es el peor dia de la semana";
            break;
        case 2:
            cout << "Hoy es el segundo peor dia de la semana";
            break;
        case 3:
            cout << "Ya estamos a mitad de semana";
            break;
        case 4:
            cout << "Hoy es juernes";
            break;
        case 5:
            cout << "Ya se acaba la semana";
            break;
        case 6:
            cout << "Hoy es el mejor dia de la semana";
            break;
        case 7:
            cout << "Parece mentira que mañana ya sea lunes";
            break;
        default:
            cout << "Lo que has introducido no es un dia de la semana";
    }
    return 0;
}