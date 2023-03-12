<?php

    class ISABELDB{
        //this->db= "";
        public function __construct($basededatos){
            $this->db = $basededatos;
            echo "La base de datos que se ha seleccionado es: ".$this->db."<br>";
        }
        public function peticion($consulta){
            echo "A continuación vamos a procesar la siguiente consulta: ".$consulta."<br>";
            
            $primerapalabra = explode(" ",$consulta)[0];
            $segundapalabra = explode(" ",$consulta)[1];
            $tercerapalabra = explode(" ",$consulta)[2];
            
            echo "La primera palabra es: ".$primerapalabra."<br>";
            switch($primerapalabra){
                //Hacemos primero un CREATE donde nos crea una nueva tabla
                case "CREATE":
                        echo "Voy a crear algo<br>";
                        if($segundapalabra == "TABLE"){
                            //"a" de apendizar. El texto va a ser todo aquello que ponga en la tercera palabra
                            $myfile = fopen("db/".$this->db."/".$tercerapalabra.".csv", "a") or die("Unable to open file!");
                            $text = $consulta;
                            preg_match('#\((.*?)\)#', $text, $match);
                            print $match[1];
                            $txt = $match[1];
                            $campos = explode(",",$txt);
                            $cadenacampos = "";
                            for($i = 0;$i<count($campos);$i++){
                                $cadenacampos .= '"'.$campos[$i].'",';
                            }
                            $recortado = substr($cadenacampos, 0, -1);
                            fwrite($myfile, $recortado."\n");
                            
                            fclose($myfile);
                        }
                        break;
                    
                //Hacemos el INSERT para insertar datos
                case "INSERT":
                    $tabla = explode(" ", $consulta)[2];
                    $myfile = fopen("db/".$this->db."/".$tabla.".csv", "a") or die("Unable to open file!");
                    $text = $consulta;
                    preg_match('#\((.*?)\)#', $text, $match);
                    print $match[1];
                    $txt = $match[1];
                    fwrite($myfile, $txt."\n");
                    break;
                    
                //Creamos la selección para leer la base de datos
                case "SELECT":
                    $piezas = explode(" ", $consulta);
                    foreach( $piezas as $key => $value )
                    {
                        if($piezas[$key] == 'FROM' )
                        {
                            $tabla = $piezas[$key+1];
                            break;
                        }
                    }
                    echo "La tabla es: ".$tabla."<br>";
                    $array = [];
                    $contador = 0;
                    $file = fopen("db/".$this->db."/".$tabla.".csv", 'r');
                    $line = fgetcsv($file);
                    var_dump($line);
                    $nombrescampo = $line;
                    
                    
                    $file = fopen("db/".$this->db."/".$tabla.".csv", 'r');
                    while(($line = fgetcsv($file)) !== FALSE){
                        $array[$contador] = $line;
                        for($i = 0;$i<count($line);$i++){
                            $array[$contador][$nombrescampo[$i]] = $line[$i];
                        }
                       $contador++;
                    }
                    
                    fclose($file);
                    //var_dump($array);
                    return $array;
                    break;
                    
            }
        }
    }
    

?>