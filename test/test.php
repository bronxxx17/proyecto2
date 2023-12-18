<?php

$apellidos = "MATEO PAULLAC";
$nombres = "JOSEPH ALVARO";

define("DNI" , "72183871");

//echo $apellidos ."". $nombres ."". DNI;



//arreglo (1) - uni-dimensional
$amigos = array ("Karina" , "Melissa " , "Valeria" , "Emily" , "Sheyla");
$paises = ["peru" , "argentina" , "venezuela", "brasil"];
//echo $amigos;



//funcion imprimir : tipo  , longitud , data (debug)
//var_dump($amigos);
/*
foreach($amigos as $amigo){
  echo $amigo;
}
*/

//arreglo (2) multi _ dimensional
$software = [
  ["Eset" , "Avast" , "Windows Defender " , "Avira" , "Karspersky"],
  ["WarZone" , "GOW" , "Free Fire " , "Pepsiman" , "MarioBross"],
  ["Vcode" , "NetBeans" , "Android" , "PSeint"]
];

/* echo $software[0][3] . "<br>" ;    // Avira
echo $software[2][0] . "<br>" ;   // VScode
echo $software[2][2] . "<br>" ;  // Android Studio 
echo $software[1][0] . "<br>" ; //WarZone */

/* foreach ($software as $lista){
  foreach($lista as $software){
    echo $software . "<br>";
  }
} */

//arreglo (3) asociado (sin indice)
//php , JS (asociativo) , JAVA (mapas) , C#(listas) , Python(Diccionario)
$catalogo = [

  "so"   => "Windows 10",
  "antivirus" => "Panda",
  "utilizario" => "WinRAR",
  "videojuego" => "MarioBross"
];
/* echo $catalogo ["utilizario"]; */

//arreglo (4) multidimensional + asociativo (con/sin indice)
$desarrollador = [
    "datospersonales" => [
      "apellios"  => "Mateo Paullac ",
      "nombres"  => "Joseph Alvaro ",
      "edad"  => 39,
      "telefonos" => ["963258741" , "987654321"]
    ],
    "formacion"  => [
      "inicial" => ["Scool"],
      "primario" => ["Millenium"],
      "secundaria" => ["Laravel" , "CodeIntiger", "Python" , "zend"]
    ],
    "habilidades" => []
];
/* echo "<pre>";
var_drump($desarrollador);
echo"</pre>"; */

echo json_encode($desarrollador);



















