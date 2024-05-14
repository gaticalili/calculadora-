<html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Gastos Mensuales</title>
</head>
<body>
    <h1>Calculadora de Gastos Mensuales</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="escuela"> ESCUELA:</label>
        <input type="number" name="escuela" id="escuela" required><br>

        <label for="tarjeta"> TARJETA:</label>
        <input type="number" name="tarjeta" id="tarjeta" required><br>

        <label for="gimnacio"> GIMNACIO:</label>
        <input type="number" name="gimnacio" id="gimnacio" required><br>

        <!-- Agrega más categorías según sea necesario -->

        <label for="presupuesto">Presupuesto Mensual:</label>
        <input type="number" name="presupuesto" id="presupuesto" required><br>

        <input type="submit" name="calcular" value="Calcular Gastos">
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        $alimentacion = $_POST['alimentacion'];
        $transporte = $_POST['transporte'];
        $entretenimiento = $_POST['entretenimiento'];
        // Asegúrate de agregar las nuevas categorías aquí

        $totalGastos = $alimentacion + $transporte + $entretenimiento;
        // Suma las nuevas categorías al total de gastos

        $presupuesto = $_POST['presupuesto'];

        echo "<h3>Total de Gastos: $" . $totalGastos . "</h3>";

        if ($totalGastos > $presupuesto) {
            echo "<p style='color:red;'>Has excedido tu presupuesto mensual.</p>";
        } else {
            echo "<p style='color:green;'>Estás dentro de tu presupuesto.</p>";
        }
    }
    ?>
</body>
</html>