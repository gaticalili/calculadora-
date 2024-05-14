<?php
function validarContrasena($contrasena) {
    $longitudMinima = 8;
    $caracteresEspeciales = '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/';

    // Verifica la longitud mínima
    if (strlen($contrasena) < $longitudMinima) {
        return "La contraseña debe tener al menos {$longitudMinima} caracteres.";
    }

    // Verifica la presencia de caracteres especiales
    if (!preg_match($caracteresEspeciales, $contrasena)) {
        return "La contraseña debe contener al menos un caracter especial.";
    }

    return "La contraseña es válida.";
}

// Procesa el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contrasena = $_POST['contrasena'];
    $resultado = validarContrasena($contrasena);
    echo $resultado;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validador de Contraseñas</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit">Validar</button>
    </form>
</body>
</html>