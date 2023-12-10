#include <iostream>
using namespace std;

int main(){
    float operando1 = 4;
    float operando2 = 3;
    
    bool comparacion;
    
    //IGUALDAD
    comparacion = operando1 == operando2;
    cout << "¿Es cierto que el operando 1 es igual que el operando 2? " << comparacion << "\n";
    //NO IGUALDAD
    comparacion = operando1 != operando2;
    cout << "¿Es cierto que el operando 1 NO es igual que el operando 2? " << comparacion << "\n";
    //MENOR QUE
    comparacion = operando1 < operando2;
    cout << "¿Es cierto que el operando 1 es menor que el operando 2? " << comparacion << "\n";
    //MAYOR QUE
    comparacion = operando1 > operando2;
    cout << "¿Es cierto que el operando 1 es menor que el operando 2? " << comparacion << "\n";
    //MAYOR  O IGUAL QUE
    comparacion = operando1 >= operando2;
    cout << "¿Es cierto que el operando 1 es mayor o igual que el operando 2? " << comparacion << "\n";
    //MENOR  O IGUAL QUE
    comparacion = operando1 <= operando2;
    cout << "¿Es cierto que el operando 1 es menor o igual que el operando 2? " << comparacion << "\n";
    
    return 0;
}