#include <iostream>
using namespace std;

//en la función principal defino los datos con los que voy a trabajar
int main(){
    //defino la longitud de la agenda
        int longitud = 100;
    //Creo una estructura
        struct registro{
            string nombre;
            int telefono;
            string email;
        };
    //Defino el array de agenda
        registro agenda[100];
    
    //Muestro el menu inicial al usuario de la aplicación
    cout << "Programa agenda v.001 por Isabel González \n";
    cout << "Escoge una opcion \n";
    cout << "1.- Introducir un registro \n";
    cout << "2.- Listar un registro \n";
    
    return 0;
};