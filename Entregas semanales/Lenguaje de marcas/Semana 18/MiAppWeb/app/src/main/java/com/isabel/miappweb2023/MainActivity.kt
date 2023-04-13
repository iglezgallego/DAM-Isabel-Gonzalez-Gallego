package com.isabel.miappweb2023

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.webkit.WebView

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        //Cargar el archivo html de assets
        val url = "file:///android_asset/index.html"
        val miVistaWeb: WebView = findViewById(R.id.vistaWeb)
        miVistaWeb.loadUrl(url)
        //Habilitar javascript
        val ajustesVisorWeb = miVistaWeb.getSettings()
        ajustesVisorWeb.javaScriptEnabled = true
    }
}