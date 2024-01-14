#include <iostream>
//libreria para poder leer y escribir en archivos
#include <fstream>

using namespace std;

int main(){
    string linea;
    ifstream archivo;
    //le digo que me lea un archivo que aun no existe
    archivo.open ("miarchivo2.txt");
    //si existe el archivo que menciono
    if(archivo.is_open()){
        //mientras exista algo escrito en el documento
        while(getline(archivo,linea)){
            //saca la linea por pantalla
            cout << linea << "\n";
        }
        //si no existe el archivo
    }else{
        cout << "Ha ocurrido algun tipo de error \n";
    }
    archivo.close();
    
    return 0;
};