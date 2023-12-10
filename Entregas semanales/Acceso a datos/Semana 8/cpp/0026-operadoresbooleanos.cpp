#include <iostream>
using namespace std;

int main(){
    int operando1 = 4;
    int operando2 = 3;
    int operando3 = 5;
    int operando4 = 5;
    int operando5 = 6;
    int operando6 = 7;
    bool comparacion;
    
    //AND, todas tienen que ser ciertas para que de cierta
    comparacion = operando1 == operando2 && operando3 == operando4;
    cout << "¿Es cierto que el op1 es igual que op2 y que op3 es igual a op4?: " << comparacion << "\n";
    //OR, con que una sea cierta, ya es cierta
    comparacion = operando1 == operando2 || operando3 == operando4;
    cout << "¿Es cierto que el op1 es igual que op2 o que op3 es igual a op4?: " << comparacion << "\n";
    //
    comparacion = operando1 == operando2 && operando3 == operando4 && operando5 == operando6;
    cout << "¿Es cierto que el op1 es igual que op2 y que op3 es igual a op4?: " << comparacion << "\n";
    //
    comparacion = operando1 == operando2 || operando3 == operando4 || operando5 == operando6;
    cout << "¿Es cierto que el op1 es igual que op2 o que op3 es igual a op4?: " << comparacion << "\n";
    
    return 0;
}