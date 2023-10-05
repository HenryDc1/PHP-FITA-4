<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ENDEVINA EL NOMBRE</h1>
    <?php
    session_start();
    function getForm(){
        echo "<form method='POST'>";
            echo "<input type='number' name='endevina'>";
            echo "<input type='submit' value='endevina'>";
            echo "</form>";
    }


        if(!isset($_POST['endevina'])){
            getForm();
        }else {
            if($_POST['endevina']===$_SESSION['ocult']){
                echo "<h3>Felicitats el numero es igual</h3>";
                echo "<a href='ex41pagina1.php'>TORNAR A L'INICI</a>";
            }
            elseif($_POST['endevina']<$_SESSION['ocult']){
                echo "<h3> El número que estas buscant es major</h3>";
                getForm();
            }
            elseif ($_POST['endevina']>$_SESSION['ocult']) {
                echo "<h3> El número que estas buscant es menor</h3>";
                getForm();
            }

        }
    ?>
</body>
</html>