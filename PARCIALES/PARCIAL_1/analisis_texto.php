<?php
// Incluimos el archivo de utilidades
include 'utilidades_texto.php';

// Definimos un array con 3 frases diferentes
$frases = [
    "El PARCIAL #1 de Desarrollo de Software VII es el dia 3 de Septiembre ",
    "Debemos Repasar La Teoria y lo Practico",
    "Es Necesario llevar nuestras laptops"
];

// Generamos la tabla HTML
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Frase</th><th>Palabras</th><th>Vocales</th><th>Palabras Invertidas</th></tr>";

foreach ($frases as $frase) {
    $palabras = contar_palabras($frase);
    $vocales = contar_vocales($frase);
    $palabras_invertidas = invertir_palabras($frase);

    echo "<tr>";
    echo "<td>" . htmlspecialchars($frase) . "</td>";
    echo "<td>" . htmlspecialchars($palabras) . "</td>";
    echo "<td>" . htmlspecialchars($vocales) . "</td>";
    echo "<td>" . htmlspecialchars($palabras_invertidas) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
