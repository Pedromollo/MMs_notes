<?php 
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location:index.php");
        exit;
    }

include("CLASSES/conexão.php");

$uso = $_SESSION['id_usuario'];
$consulta = "SELECT * FROM anota_notas WHERE usuarios_id_usuario = $uso";
$conn = $con->query($consulta) or die($con->error);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suasnotas</title>
    <link rel="stylesheet" href="css/estilob.css">
</head>
<body>

<div id="back">
        <a href="areaprivada.php"> <img src="img/bank1.png" alt=""></a>
</div>

<div id="superior-logo">
        <img src="img/logo4.png" width="150px">
    </div>

    <div id="h1">
    <h1>Suas notas</h1>
    </div>

<table border="1" id="table"> 
            <tr> 
                <td><strong>Título<strong></td> 
                <td><strong>Nota<strong></td> 
            </tr> 
        <?php while($dado = $conn->fetch_array()) { ?>
            <tr> 
                <td><?php echo $dado["titulo" ]?></td>
                <td><?php echo $dado["anotacao"]?></td>
            </tr> 
        <?php }?>
    </table>

</body>
</html>