#include <iostream>
#include <string.h>
using namespace std;
//Bucle DO WHILE esta estructura se ejecuta una vez siempre y luego se pregunta si se tenia que haber ejecutado
int main(){
    int dia = 44;
    do{
        cout << "hoy es el dia " << dia << " del mes \n";
    }while(dia < 30);
    return 0;
}