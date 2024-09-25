<?php
require_once 'Clases.php';
require_once 'TareaDesarrollo.php';
require_once 'TareaDiseno.php';
require_once 'TareaTesting.php';
require_once 'GestorTareas.php';



$gestorTareas = new GestorTareas();
$estadosLegibles = [
    'pendiente' => 'Pendiente',
    'en_progreso' => 'En Progreso',
    'completada' => 'Completada',
];

$prioridadesLegibles = [
    1 => 'Alta',
    2 => 'Media alta',
    3 => 'Media',
    4 => 'Media baja',
    5 => 'Baja',
];

if (!isset($_GET['action']) || !in_array($_GET['action'], ['add', 'edit', 'delete', 'status', 'filter', 'list'])) {
    echo "Acción no reconocida.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['titulo']) || empty($_POST['descripcion']) || !isset($_POST['prioridad'])) {
        echo "Por favor, complete todos los campos obligatorios.";
    } else {
        $nuevaTarea = null;
        switch ($_POST['tipo']) {
            case 'desarrollo':
                $nuevaTarea = new TareaDesarrollo($_POST);
                break;
            case 'diseno':
                $nuevaTarea = new TareaDiseno($_POST);
                break;
            case 'testing':
                $nuevaTarea = new TareaTesting($_POST);
                break;
        }
        if ($nuevaTarea) {
            $gestorTareas->agregarTarea($nuevaTarea);
            $mensaje = "Tarea agregada correctamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Tareas</title>
</head>
<body>
    <h1>Gestor de Tareas</h1>
    
    <form method="POST" action="index.php?action=add">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>
        
        <label for="prioridad">Prioridad:</label>
        <select name="prioridad" required>
            <?php foreach ($prioridadesLegibles as $value => $label): ?>
                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" onchange="mostrarCamposEspecificos(this.value)">
            <option value="desarrollo">Desarrollo</option>
            <option value="diseno">Diseño</option>
            <option value="testing">Testing</option>
        </select>

        <div id="campoEspecifico"></div>

        <button type="submit">Guardar Tarea</button>
    </form>

    <script>
        function mostrarCamposEspecificos(tipo) {
            let campoEspecifico = document.getElementById('campoEspecifico');
            campoEspecifico.innerHTML = ''; // Limpiar campos anteriores

            if (tipo === 'desarrollo') {
                campoEspecifico.innerHTML = '<label for="lenguajeProgramacion">Lenguaje de Programación:</label><input type="text" name="lenguajeProgramacion" required>';
            } else if (tipo === 'diseno') {
                campoEspecifico.innerHTML = '<label for="herramientaDiseno">Herramienta de Diseño:</label><input type="text" name="herramientaDiseno" required>';
            } else if (tipo === 'testing') {
                campoEspecifico.innerHTML = '<label for="tipoTest">Tipo de Test:</label><select name="tipoTest" required><option value="unitario">Unitario</option><option value="integracion">Integración</option><option value="e2e">E2E</option></select>';
            }
        }
    </script>

    <h2>Tareas</h2>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Prioridad</th>
                <th>Detalles Específicos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gestorTareas->listarTareas() as $tarea): ?>
                <tr>
                    <td><?php echo $tarea->titulo; ?></td>
                    <td><?php echo $tarea->descripcion; ?></td>
                    <td><?php echo $estadosLegibles[$tarea->getEstado()]; ?></td>
                    <td><?php echo $prioridadesLegibles[$tarea->prioridad]; ?></td>
                    <td><?php echo $tarea->obtenerDetallesEspecificos(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
