#include <iostream>
#include <string>
using namespace std;

int main(){
    //si quiero que el sistema me escriba comillas y no se salga de la cadena, usamos \ antes de las comillas
    string anuncio = "Este es un curso de \"C++\" realizado por Isabel Gonzalez-Gallego Rivera\n";

    cout << anuncio;
    
    return 0;
}