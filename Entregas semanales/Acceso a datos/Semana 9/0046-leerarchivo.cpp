#include <iostream>
//libreria para poder leer y escribir en archivos
#include <fstream>

using namespace std;

int main(){
    string linea;
    ifstream archivo;
    archivo.open ("miarchivo.txt");
    //mientras exista algo escrito en el documento
    while(getline(archivo,linea)){
        //saca la linea por pantalla
        cout << linea << "\n";
    };
    archivo.close();
    
    return 0;
};