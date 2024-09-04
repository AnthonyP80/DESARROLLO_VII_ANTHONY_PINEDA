<?php
function contar_palabras($texto) {

    return str_word_count($texto);
}

function contar_vocales($texto) {

    $texto = strtolower($texto);

    $vocales = 'aeiou';
    $contador = 0;

    for ($i = 0; $i < strlen($texto); $i++) {
        if (strpos($vocales, $texto[$i]) !== false) {
            $contador++;
        }
    }
    return $contador;
}


function invertir_palabras($texto) {
    
    $palabras = explode(' ', $texto);
    
    $palabras_invertidas = array_reverse($palabras);
    
    return implode(' ', $palabras_invertidas);
}
?>

