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
    <link rel="shortcut icon" href="img/logo4.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do usuário</title>
    <link rel="stylesheet" href="css/estilob.css">
</head>
<body>
    
    <div id="back">
        <a href="sair.php"> <img src="img/bank1.png" alt=""></a>
    </div>

    <div id="superior-logo">
        <img src="img/logo4.png" width="150px">
    </div>

    <div id="h1">
    <h1>Notas</h1>
    </div>

<form method="POST">
    <div id="form-titulo">
        <input type="text" name="titulo" placeholder="Título" maxlength="50">
    </div>
    <div id="form-anotar">
        <input type="text" name="nota" placeholder="..." maxlength="300">
    </div>




<?php 
if(isset($_POST['salvar']))
{
    

    $titulo = $_POST['titulo'];
    $nota = $_POST['nota'];
    $idusuario = $_SESSION['id_usuario']; 
    

        if(!empty($titulo) && !empty($nota) && !empty($idusuario))
            {
                $textos = "INSERT INTO anota_notas (titulo, anotacao,usuarios_id_usuario) VALUES ('$titulo', '$nota', '$idusuario')";
                $resultado_usuario = mysqli_query($con, $textos);
                

                ?>
                <div class="msgerro">
                    <?php echo "Sua nota foi salva"?>
                </div>
                <?php

            }
            else
            {
                ?>
                    <div class="msgerro">
                        <?php echo "Preencha ambos os campos para salvar!"?>
                    </div>
                <?php
            }
}
?>

<div id="salvi">
        <input type="submit" value="Salvar" name="salvar" >
 </div>
</form>


    

<form action="suasnotas.php">
<div id="box">
<input type="submit" value="Suas notas" name="suasnotas" >
</div>
</form>  



</body>
</html>

