#include <iostream>
using namespace std;

int main(){
    cout << "Operador de asignacion \n";
    float operando1 = 4;
    cout << "Ahora el operando vale: " << operando1 << "\n";
    //aumenta un valor a la variable
    operando1++;
    cout << "Ahora el operando vale: " << operando1 << "\n";
    //decrece un valor a la variable
    operando1--;
    cout << "Ahora el operando vale: " << operando1 << "\n";
    
    //aumenta más de un valor a la variable
    operando1 = operando1 + 5;
    cout << "Ahora el operando vale: " << operando1 << "\n";
    //aumenta más de un valor a la variable de otra forma
    operando1 += 5;
    cout << "Ahora el operando vale: " << operando1 << "\n";
    //decrece más de un valor a la variable
    operando1 -= 5;
    cout << "Ahora el operando vale: " << operando1 << "\n";
    
    //multiplica a la variable de otra forma
    operando1 *= 5;
    cout << "Ahora el operando vale: " << operando1 << "\n";
    //divide a la variable de otra forma
    operando1 /= 5;
    cout << "Ahora el operando vale: " << operando1 << "\n";
    
    
    return 0;
}