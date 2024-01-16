package com.jocarsa.variaspantallas

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.Toast

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        //Primero selecciono el boton de la pantalla 2
        val miboton: Button = findViewById(R.id.miboton)

        //Primero selecciono el boton de la pantalla 3
        val mibotonpantalla3: Button = findViewById(R.id.mibotonpantalla3)

        //Añado un escuchador para eschuchar el click del boton pantalla2
        miboton.setOnClickListener{
            var edad:Int = 23
            //Me saca un mensaje emergente
            //Toast.makeText(applicationContext,"edad"+edad, Toast.LENGTH_SHORT).show()
            //Lanzo una actividad2, a su carpeta java, desde la actividad1
            val intent = Intent(this@MainActivity,MainActivity2::class.java)
            //Pasar la variable a otra actividad con clave, parametro
            //Si aquí hago un put en el mainactivity2 tengo que hacer un get
            intent.putExtra("edad",edad.toString())
            //Arranco el intent
            startActivity(intent)
        }

        //Añado un escuchador para eschuchar el click del boton de la pantalla 3
        mibotonpantalla3.setOnClickListener{
            var edad:Int = 46
            //Me saca un mensaje emergente
            //Toast.makeText(applicationContext,"edad"+edad, Toast.LENGTH_SHORT).show()
            //Lanzo la actividad3, a su carpeta java, desde la actividad1
            val intent = Intent(this@MainActivity,MainActivity3::class.java)
            //Pasar la variable a otra actividad con clave, parametro
            //Al hacer un put en el mainactivity3 tengo que hacer un get
            intent.putExtra("edad",edad.toString())
            //Arranco el intent
            startActivity(intent)
        }



    }
}