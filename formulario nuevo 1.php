
<html>
<head>
    <title>Registro de Evento</title>
</head>
<body>

<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    // Verificar la edad
    if ($edad < 18) {
        // Si es menor de 18, mostrar mensaje de error
        echo "Lo siento, $nombre, eres menor de 18 años y no puedes acceder al evento.";
    } else {
        // Si es mayor de 18, mostrar mensaje de bienvenida
        echo "¡Bienvenido al evento, $nombre!";
    }
}
?>

<h2>Registro de Evento</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre"><br><br>
    <label for="edad">Edad:</label><br>
    <input type="number" id="edad" name="edad"><br><br>
    <input type="submit" value="Enviar">
</form>

</body>
</html>