<?php
session_start();

// Inicializa el total de duración si no está ya establecido
if (!isset($_SESSION['duracion_total'])) {
    $_SESSION['duracion_total'] = 0;
}

// Procesa el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actividad = $_POST['actividad'];
    $duracion = $_POST['duracion'];

    // Añade la duración a la duración total
    $_SESSION['duracion_total'] += $duracion;

    // Guarda la actividad en el array de sesión
    $_SESSION['actividades'][] = ['actividad' => $actividad, 'duracion' => $duracion];
}

?>

<html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Actividades Físicas</title>
</head>
<body>
    <h1>Registro de Actividades Físicas</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="actividad">Actividad:</label>
        <input type="text" id="actividad" name="actividad" required>

        <label for="duracion">Duración (en minutos):</label>
        <input type="number" id="duracion" name="duracion" required>

        <button type="submit">Registrar Actividad</button>
    </form>

    <?php
    if (!empty($_SESSION['actividades'])) {
        echo "<h2>Resumen de Actividades</h2>";
        echo "<ul>";
        foreach ($_SESSION['actividades'] as $activ) {
            echo "<li>" . $activ['actividad'] . " - Duración: " . $activ['duracion'] . " minutos</li>";
        }
        echo "</ul>";
        echo "<strong>Total de ejercicio: " . $_SESSION['duracion_total'] . " minutos</strong>";
    }
    ?>
</body>
</html>