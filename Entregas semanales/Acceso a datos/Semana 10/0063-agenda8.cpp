#include <iostream>
#include <cstdlib>
#include <fstream>
using namespace std;

//DEFINO LOS DATOS CON LOS QUE VOY A TRABAJAR FUERA DE LA FUNCION
//Defino un cursor para saber en que posicion esta la agenda
int cursor = 0;
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

void menu(){
    
    //Cuando el programa carga, en primer lugar cargo los registros previamente guardados
    string linea;
    ifstream archivo;
    archivo.open ("agenda.txt");
    //mientras exista algo escrito en el documento
    while(getline(archivo,linea)){
        //saca la linea por pantalla
        //cout << linea << "\n";
    };
    archivo.close();
    
    //Muestro el menu incial al usuario de la aplicación
    cout << "Programa agenda v.001 por Isabel González \n";
    cout << "Escoge una opcion \n";
    cout << "1.- Introducir un registro \n";
    cout << "2.- Listar un registro \n";
    cout << "3.- Salir del programa \n";
    cout << "4.- Guardar la agenda \n";
    
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
        agenda [cursor].nombre = nombre;
        agenda [cursor].telefono = telefono;
        agenda [cursor].email = email;
        cursor++;
        cout << "Registros en la agenda \n";
        for (int i=0; i< cursor; i++){
            cout << agenda[i].nombre << "," << agenda[i].telefono << "," << agenda[i].email << "\n";
        }
        cout << "\n\n\n";
        
        
    }else if(opcion == "2"){
        cout << "Vamos a listar los elementos de la agenda: \n";
        cout << "Registros en la agenda \n";
        for (int i=0; i< cursor; i++){
            cout << agenda[i].nombre << "," << agenda[i].telefono << "," << agenda[i].email << "\n";
        }
        cout << "\n\n\n";
        
    }else if(opcion == "3"){
        //salir del programa
        exit(0);
    
    
    }else if(opcion == "4"){
        ofstream archivo;
        archivo.open ("agenda.txt");
        //Para cada linea del cursor
        for (int i = 0; i < cursor; i++) {
            string cadena = agenda[i].nombre + "," + to_string(agenda[i].telefono) + "," + agenda[i].email + "\n";
            archivo << cadena;
        }
        archivo.close();
    }
    
    //le digo que al terminar, quiero volver a ejecutar el programa - funcion recursiva
    menu();
}

int main(){
    system("cls"); //limpia la pantalla - clear en MAC
    //llamo a la función menu
    menu();
    return 0;
};