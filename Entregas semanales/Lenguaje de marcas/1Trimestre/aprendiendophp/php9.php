<?php

    class Persona{
            //Propiedades- atributos
        
            private $edad = 0;
            private $pelo = "no mucho"; 
            private $nombre = "Juan";
        
            //Metodos - acciones
        
        public function diHola(){
            echo "Te estoy diciendo Hola <br>";
        }
         
        public function getNombre(){
            echo "Me llamo ".$this->nombre."<br>";
        }
        public function getPelo(){
            echo "Mi pelo es ".$this->pelo."<br>";
        }
       
        public function setNombre($nuevonombre){
            $this->nombre = $nuevonombre;
        }
    }
 
    $juan = new Persona();
    //echo "La edad de Juan es ".$juan->edad."<br>";
    //echo "El pelo de Juan es ".$juan->pelo."<br>";
    //echo "El nombre de Juan es ".$juan->nombre."<br>";
    
    //$juan->nombre = "Juan";
    //echo "El nombre de Juan es ".$juan->nombre."<br>";

    $juan->diHola();
    $juan->getNombre();
    $juan->getPelo();
    $juan->setNombre("Antonio");
    $juan->getNombre();
?>