#include <iostream>
#include <string>
using namespace std;

int main(){
    string nombre = "Isabel";
    int edad = 31;
    
    //Para encandenar un string con un int tengo que convertir el int en string, porque le signo + lo confunde con sumar
    cout << nombre+" "+to_string(edad)+"\n";
    
    return 0;
}