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
    //Solicito una entrada del usuario
    cin >> opcion;
    cout << "Has elegido la opcion: " << opcion << "\n";
    //Ejecuto un código u otro en función de la entrada del usuario
    if(opcion == "1"){
        cout << "Vamos a insertar un nuevo registro en la agenda \n";
        cout << "Introduce el nombre de la persona: \n";
        string nombre;
        cin >> nombre;
        
        cout << "Introduce el telefono de la persona: \n";
        int telefono;
        cin >> telefono;
        
        cout << "Introduce el email de la persona: \n";
        string email;
        cin >> email;
        
        cout << "Voy a introducir: " << nombre << ", " << telefono << ", " << email << "\n";
    }else if(opcion == "2"){
        cout << "Vamos a listar los elementos de la agenda \n";
    }
    return 0;
};