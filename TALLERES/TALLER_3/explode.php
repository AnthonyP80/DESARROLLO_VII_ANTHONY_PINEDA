
<?php
// Ejemplo de uso de explode()
$frase = "Manzana,Naranja,Plátano,Uva <br>";
$frutas = explode(",", $frase);

echo "Frase original:<br> $frase
";
echo "Array de frutas: <br>
";
print_r($frutas);

// Ejercicio: Crea una variable con una lista de tus 5 películas favoritas separadas por guiones (-)
// y usa explode() para convertirla en un array
$misPeliculas = "cars1-avatar-infinity wars-spirit-doctor Stringe <br>"; // Reemplaza esto con tu lista de películas
$arrayPeliculas = explode("-", $misPeliculas);

echo "
Mis películas favoritas: <br>
";
print_r($arrayPeliculas);

// Bonus: Usa explode() con un límite
$texto = "Uno,Dos,Tres,Cuatro,Cinco <br>";
$array = explode(",", $texto, 3);

echo "
Texto original:<br> $texto   
";
echo "Array con límite:<br>
";
print_r($array);
?>
      
