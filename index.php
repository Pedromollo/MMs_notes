<?php 
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="shortcut icon" href="img/logo4.png" />
    <link rel="stylesheet" href="css/estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM's Notes</title>
    <link>
</head>
<body>
    
    <div id="corpo-form">
        <img src="img/logo4.png" width="200px">
        <h1>Notas</h1>
        <h2>Entrar</h2>
        
            <form method="POST">
                <input type="email" placeholder="Usúario" maxlength="50" name="email">
                <input type="password" placeholder="Senha" maxlength="32" name="senha">
                <input type="submit" value="Acessar " maxlength="32" name="confiSenha">
            </form>
            <a href="cadastrar.php">Ainda não possui cadastro? <strong>Cadastre-se!</strong> </a>
    </div>

<?php

if(isset($_POST['email']))
{
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
 

        //verificar se o campo está vazio
        if(!empty($email) && !empty($senha))
        {
            $u->conectar("notas_mms", "localhost", "root", "");

                if($u->msgErro == "")
                {
                    if($u->logar($email,$senha))
                    {
                        header("location:areaprivada.php");
                    }else{

                        ?>
                            <div class="msgerro">
                                <?php echo "Email e/ou senha estão incorretos!"; ?>
                            </div>
                        <?php

                    
                    }

                }else{
                        ?>
                            <div class="msgerro">
                            <?php echo "Erro: ".$u->msgErro; ?> 
                            </div>
                        <?php
                     }

        }else{

            ?>
                <div class="msgerro">
                <?php echo "Prencha todos os campos!"; ?>
                </div>
            <?php
            }
}
    
?>

</body>
</html>