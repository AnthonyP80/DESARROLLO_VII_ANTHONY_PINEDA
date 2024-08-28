
<?php
// Ejemplo de uso de str_replace()
$frase = "El gato negro saltó sobre el perro negro <br>";
$fraseModificada = str_replace("negro", "blanco", $frase);

echo "Frase original: $frase
";
echo "Frase modificada: $fraseModificada
";

// Ejercicio: Crea una variable con una frase que contenga al menos tres veces la palabra "PHP"
// y usa str_replace() para cambiar "PHP" por "JavaScript"
$miFrase = "PHP es el lenguaje de programación mas utlizado, me gusta PHP por que es bastante intuitivo y con PHP tengo mas oportunidades de empleo <br>"; // Reemplaza esto con tu frase
$miFraseModificada = str_replace("PHP", "JavaScript", $miFrase);

echo "
Mi frase original:<br> $miFrase
";
echo "Mi frase modificada: <br> $miFraseModificada
";

// Bonus: Usa str_replace() para reemplazar múltiples palabras a la vez
$texto = "Manzanas y naranjas son frutas. Me gustan las Manzanas y las naranjas.<br>";
$buscar = ["Manzanas", "naranjas"];
$reemplazar = ["Peras", "uvas"];
$textoModificado = str_replace($buscar, $reemplazar, $texto);

echo "
Texto original :<br> $texto
";
echo "Texto modificado:<br> $textoModificado
";
?>
          

