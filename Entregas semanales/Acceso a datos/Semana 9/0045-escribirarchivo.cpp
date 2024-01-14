#include <iostream>
//libreria para poder leer y escribir en archivos
#include <fstream>

using namespace std;

int main(){
    ofstream archivo;
    archivo.open ("miarchivo.txt");
    archivo << "hola archivo \n";
    archivo.close();
    
    return 0;
};