<?php
// Iniciar sesión para usar variables de sesión
session_start();

// Si el formulario ha sido enviado, procesar los datos de entrada
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asignar las tareas a una variable de sesión
    $_SESSION['tareas'][] = [
        'nombre' => $_POST['nombre'],
        'hora_inicio' => $_POST['hora_inicio'],
        'duracion' => $_POST['duracion']
    ];
}

// Función para mostrar el horario de tareas
function mostrarHorario($tareas) {
    // Ordenar las tareas por hora de inicio
    usort($tareas, function($a, $b) {
        return $a['hora_inicio'] <=> $b['hora_inicio'];
    });

    echo "<h2>Horario de Tareas para Hoy</h2>";
    echo "<ul>";
    foreach ($tareas as $tarea) {
        echo "<li><strong>" . $tarea['nombre'] . "</strong>: " . $tarea['hora_inicio'] . " - Duración: " . $tarea['duracion'] . " minutos</li>";
    }
    echo "</ul>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ejercicio tp 5</title>
</head>
<body>
    <h1>Planificador</h1>
    <form method="post">
        <label for="nombre">tarea:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="hora_inicio">Inicio (formato 24h, ej: 14:00):</label>
        <input type="time" id="hora_inicio" name="hora_inicio" required>

        <label for="duracion">Duración:</label>
        <input type="number" id="duracion" name="duracion" required>

        <input type="submit" value="Agregar Tarea">
    </form>

    <?php
    // Si hay tareas, mostrar el horario
    if (!empty($_SESSION['tareas'])) {
        mostrarHorario($_SESSION['tareas']);
    }
    ?>
</body>
</html>