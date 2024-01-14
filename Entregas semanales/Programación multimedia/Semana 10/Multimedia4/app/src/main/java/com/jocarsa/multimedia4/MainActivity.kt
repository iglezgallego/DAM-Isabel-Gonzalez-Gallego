package com.jocarsa.multimedia4

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
//Importa button y edittext
import android.widget.Button
import android.widget.EditText
import android.widget.Toast

class MainActivity : AppCompatActivity() {
    //propiedad de tipo privada que carga solo cuando hay cargado lo demás
    //Declaramos los tipos de variables que son de tipo Edit text y button
    private lateinit var campo1: EditText
    private lateinit var campo2: EditText
    private lateinit var miboton: Button


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        //Buscamos los elemento por la id de mi UI para que los pueda reconocer
        campo1 = findViewById(R.id.campo1)
        campo2 = findViewById(R.id.campo2)
        miboton = findViewById(R.id.miboton)

        //Al boton le pongo un escuchador - Cuando sobre miboton haga click
        miboton.setOnClickListener{
            //Atrapa el valor de campo1 y campo2
            val texto1 = campo1.text.toString()
            val texto2 = campo2.text.toString()
            //con $ encadenamos
            val mensaje = "Nombre: $texto1 - Apellidos: $texto2"
            //Lanzo un toast que saca un mensaje emergente y lo muestra por pantalla
            Toast.makeText(this,mensaje, Toast.LENGTH_SHORT).show()
        }
    }
}