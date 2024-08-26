
<?php
echo "<h2>Calificador</h2>";

// Ejemplo básico
$edad = 23;
$mensaje = ($edad >= 18) ? "Eres mayor de edad" : "Eres menor de edad";
echo "Edad: $edad<br>";
echo "Mensaje: $mensaje<br><br>";



// Uso con diferentes tipos de datos
$nombre = "Anthony Pineda";
$saludo = ($nombre !== "") ? "Hola, $nombre!" : "Hola, invitado!";
echo "Nombre: '$nombre'<br>";
echo "Saludo: $saludo<br><br>";

// Comparación con if-else tradicional
$calificacion = 90;
if ($calificacion >= 90 AND $calificacion <=100) {
    $letra = "A";
    
} elseif ($calificacion >= 80 AND $calificacion <= 89) {
    $letra = "B";
    
}
elseif ($calificacion >= 70 AND $calificacion <= 79) {
    $letra = "C";
    
}
elseif ($calificacion >= 60 AND $calificacion <= 69) {
    $letra = "D";
    
}
else {
    $letra = "F";
    
}
echo "Tu Puntuacion es de: $calificacion<br>";
echo "Tu Calificacion es: $letra<br>";

$nota= $letra;
$promedio = ($nota == "A" || $nota == "B" || $nota == "C" || $nota == "D") ? "Aprobado" : "Reprobado";

echo "Calificación: $promedio<br><br>";


$puntuacion = $nota;
switch (true) {
    case ($puntuacion == "A"):
        echo "Excelente Trabajo.<br>";
        break;
    case ($puntuacion == "B"):
        echo "Buen Trabajo.<br>";
        break;
    case ($puntuacion == "C"):
        echo "Trabajo aceptable.<br>";
        break;
    case ($puntuacion == "D"):
        echo "Necesita mejorar.<br>";
        break;
    default:
        echo "Debes esforzarte Mas.<br>";
}
echo "<br>";
?>
    
