<?php
include 'funciones_tienda.php';

// Productos disponibles en la tienda
$productos = [
    'camisa' => 50,
    'pantalon' => 70,
    'zapatos' => 80,
    'calcetines' => 10,
    'gorra' => 25
];

// Carrito de compras
$carrito = [
    'camisa' => 2,
    'pantalon' => 1,
    'zapatos' => 1,
    'calcetines' => 3,
    'gorra' => 0
];

// Calcular subtotal
$subtotal = 0;
foreach ($carrito as $producto => $cantidad) {
    if (isset($productos[$producto]) && $cantidad > 0) {
        $subtotal += $productos[$producto] * $cantidad;
    }
}

// Calcular descuento
$descuento = calcular_descuento($subtotal);

// Calcular impuesto
$impuesto = aplicar_impuesto($subtotal - $descuento);

// Calcular total a pagar
$total = calcular_total($subtotal, $descuento, $impuesto);

// Mostrar resumen de la compra
echo "<h2>Resumen de la compra</h2>";
echo "<ul>";
foreach ($carrito as $producto => $cantidad) {
    if ($cantidad > 0) {
        echo "<li>$producto (Cantidad: $cantidad) - $" . $productos[$producto] * $cantidad . "</li>";
    }
}
echo "</ul>";
echo "<p>Subtotal: $$subtotal</p>";
echo "<p>Descuento aplicado: $$descuento</p>";
echo "<p>Impuesto: $$impuesto</p>";
echo "<p>Total a pagar: $$total</p>";
?>
