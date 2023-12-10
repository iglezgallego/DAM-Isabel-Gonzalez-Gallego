#include <iostream>
#include <string.h>
using namespace std;
//NO NOS DEJA HACERLO ASÍ
int main(){
    string diadelasemana = "lunes";
    //hace lo mismo que if else, es una versión más clara y menos repetitiva
    
    switch(diadelasemana){ 
        case strcmp(diadelasemana,"lunes"):
            cout << "Hoy es el peor dia de la semana";
            break;
        
    }
    return 0;
}