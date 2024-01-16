package com.jocarsa.variaspantallas

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast

class MainActivity3 : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main3)
        //Atrapo el intento
        val intent = intent
        //si vengo de otra pantalla a traves del un intent
        if(intent != null){
            val datosrecibidos = intent.getStringExtra("edad")
            //Compruebo si el cierto que estoy rebiendo datos
            if(datosrecibidos != null){
                //Toast.makeText(applicationContext,"recibo datos", Toast.LENGTH_SHORT).show()
                //Muestro un mensaje emergente con los datos recibidos
                Toast.makeText(applicationContext,"datos recibidos: "+datosrecibidos, Toast.LENGTH_SHORT).show()
            }
        }
    }
}