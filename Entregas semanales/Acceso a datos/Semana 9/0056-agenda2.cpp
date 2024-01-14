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
    //Guardo la opcion del usuario
        string opcion;
    //Muestro el menu inicial al usuario de la aplicación
    system("cls"); //limpia la pantalla - clear en MAC
    cout << "Programa agenda v.001 por Isabel González \n";
    cout << "Escoge una opcion \n";
    cout << "1.- Introducir un registro \n";
    cout << "2.- Listar un registro \n";
    cin >> opcion;
    cout << "Has elegido la opcion: " << opcion << "\n";
    
    if(opcion == "1"){
        cout << "Vamos a insertar un nuevo registro en la agenda \n";
    }else if(opcion == "2"){
        cout << "Vamos a listar los elementos de la agenda \n";
    }
    return 0;
};