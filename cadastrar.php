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
        <h2>Cadastro</h2>
            <form method="POST">
                <input type="text" name="nome" placeholder="Nome completo" maxlength="50">
                <input type="email" name="email" placeholder="Usúario" maxlength="50">
                <input type="password" name="senha" placeholder="Senha" maxlength="32">
                <input type="password" name="confiSenha" placeholder="   senha" maxlength="32">
                <input type="submit" value="Cadastrar">
            </form>
            <a href="index.php">Já efetuou seu cadastro? <strong>Entre agora!</strong> </a>
    </div>

    <?php
        
        //verificar se clicou no botão 
        if(isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confiSenha = addslashes($_POST['confiSenha']);

            //verificar se o campo está vazio
            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confiSenha))
            {   
                $u->conectar("notas_mms", "localhost", "root", "");
                
                if($u->msgErro == "") //se tá vazia tá tudo certo 
                {
                    if($senha == $confiSenha)
                    {
                        if($u->cadastrar($nome, $email, $senha))
                        {
                            ?>
                                <div id="msgsucesso">
                                    <?php echo "Cadastro realizado com sucesso! Faça login para acessar"?>
                                </div>
                            
                            <?php
                            
                        }
                        else
                        {

                            ?>
                                <div class="msgerro">
                                   <?php echo "Email já cadastrado!"?>
                                </div>
                            <?php
                        
                            
                        }
                    }
                    else
                    {

                    ?>
                        <div class="msgerro">
                            <?php echo "As senhas não conferem!"?>
                        </div>
                    <?php
                       
                    }
                    
                }
                else
                {
                    ?>
                        <div class="msgerro">
                            <?php echo "Erro: ".$u->msgErro;?>
                        </div>
                    <?php
                }
            }
            else{

                     ?>
                        <div class="msgerro">
                        <?php echo  "Preencha todos os campos, nenhum pode ficar vazio!" ?>
                     </div>
                    <?php
                
            }

        };
    
    ?>

</body>
</html>