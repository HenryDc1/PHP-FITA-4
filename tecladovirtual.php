<?php
session_start();

// Inicializar la variable de sesión si no está configurada
if (!isset($_SESSION['letras'])) {
    $_SESSION['letras'] = array();
}

// Manejar la letra clicada por el usuario
if (isset($_GET['letra'])) {
    $letraClicada = $_GET['letra'];
    $_SESSION['letras'][] = $letraClicada;
}

// Restablecer la sesión
if (isset($_GET['reset'])) {
    $_SESSION['letras'] = array();
}

// Mostrar el formulario y las letras acumuladas
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Màquina d'escriure</title>
</head>
<body>

<h1>Teclat Virtual</h1>

<!-- Mostrar letras acumuladas en un textarea -->
<div>
    <h3>Letras Acumuladas:</h3>
    <textarea rows="4" cols="50" readonly><?php echo implode('', $_SESSION['letras']); ?></textarea>
</div>

<!-- Generar el teclado virtual -->
<div>
    <?php
    $abecedario = range('A', 'Z');

    foreach ($abecedario as $letra) {
        echo "<a href='tecladovirtual.php?letra=$letra'><button>$letra</button></a> ";
    }
    ?>
</div>

<!-- Enlace para restablecer la sesión -->
<div>
    <a href='tecladovirtual.php?reset=1'><button>Restablecer Sesión</button></a>
</div>

</body>
</html>
