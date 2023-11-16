<?php
session_start();

// Inicializar la variable de sesión si no está configurada
if (!isset($_SESSION['notes'])) {
    $_SESSION['notes'] = "";
}

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Obtener el texto del formulario
    $newNote = $_POST['note'];

    // Agregar el texto al contenido de la variable de sesión
    $_SESSION['notes'] .= $newNote . "\n\n";
}
elseif (isset($_GET['reset'])) {
    // Reiniciar la sesión si se proporciona el parámetro "reset"
    session_destroy();
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>

<h1>Chat</h1>

<!-- Formulario para enviar notas -->
<form method="post" action="">

    <textarea id="note" name="note" rows="4" cols="50"></textarea><br>
    <input type="submit" name="submit" value="Enviar">
    <a href='chat.php?reset=1'><button>Limpiar chat</button></a>
</form>

<hr>

<!-- Mostrar les notes acumulades -->
<h2>Mensajes:</h2>
<pre>
<?php echo ($_SESSION['notes']); ?>
</pre>

<!-- Enlace para reiniciar la sesión -->

</body>
</html>
