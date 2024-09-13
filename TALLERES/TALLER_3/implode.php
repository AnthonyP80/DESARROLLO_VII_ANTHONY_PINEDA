
<?php
// Ejemplo de uso de implode()
$frutas = ["Manzana", "Naranja", "Plátano", "Uva <br>"];
$frase = implode(", ", $frutas);

echo "Array de frutas:<br>
";
print_r($frutas);
echo "Frase creada:<br> $frase
";

// Ejercicio: Crea un array con los nombres de 5 países que te gustaría visitar
// y usa implode() para convertirlo en una cadena separada por guiones (-)
$paises = ["Canada","Francia", "Colombia", "Mexico", "Argentina <br>"]; // Reemplaza esto con tu array de países
$listaPaises = implode("-", $paises);

echo " Mi lista de países para visitar: $listaPaises
";

// Bonus: Usa implode() con un array asociativo
$persona = [
    "nombre" => "Anthony Pineda",
    "edad" => 24,
    "ciudad" => "Panamá"
];
$infoPersona = implode(" | ", $persona);

echo "
Información de la persona:<br> $infoPersona
";
?>
      
