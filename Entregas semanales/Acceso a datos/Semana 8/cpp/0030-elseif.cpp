#include <iostream>
using namespace std;

int main(){
    string diadelasemana = "margarita";
    
    if(diadelasemana == "lunes"){
        cout << "Hoy es el peor dia de la semana";
    }else if(diadelasemana == "martes"){
        cout << "Hoy es el segundo peor dia de la semana";
    }else if(diadelasemana == "miercoles"){
        cout << "Ya estamos a mitad de semana";
    }else if(diadelasemana == "jueves"){
        cout << "Hoy es juernes";
    }else if(diadelasemana == "viernes"){
        cout << "Ya se acaba la semana";
    }else if(diadelasemana == "sabado"){
        cout << "Hoy es el mejor dia de la semana";
    }else if(diadelasemana == "domingo"){
        cout << "Parece mentira que mañana ya sea lunes";
    }else{
        cout << "Lo que has introducido no es un dia de la semana";
    }
    return 0;
}