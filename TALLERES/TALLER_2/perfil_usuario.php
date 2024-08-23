<?php
// Definición de variables
$nombre = "Anthony Sebastian Pineda Gonzalez";
$edad = 24;
$correo = "anthony.pineda@utp.ac.pa";
$telefono = 64752-8886;

define("OCUPACION", "¡Estudiante!");

// Creación de mensaje usando diferentes métodos de concatenación e impresión
$mensaje1 = "Hola, mi nombre es " . $nombre . " y tengo " . $edad . " años.";
$mensaje2 = " Este es mi correo personal: $correo    Y actualmente soy: ". OCUPACION.".";

echo $mensaje1 . "<br>";
print($mensaje2 . "<br>");

printf("Soy un: %s, Me llamo: %s, y tengo  %d años, Este es mi correo: %s, y este mi telefono: %d<br>", OCUPACION,  $nombre, $edad, $correo,$telefono);

echo "<br>TODOS  MIS DATOS:<br>";
var_dump($nombre);
echo "<br>";
var_dump($edad);
echo "<br>";
var_dump($correo);
echo "<br>";
var_dump($telefono);
echo "<br>";
var_dump(OCUPACION);
echo "<br>";
?>