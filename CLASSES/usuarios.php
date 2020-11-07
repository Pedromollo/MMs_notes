<?php

Class usuario{

        private $pdo;
        public $msgErro = ""; //se estiver vazia tá funcionando de boa 

    public function conectar ($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
                 
        try 
        {
            $pdo = new PDO("mysql:dbname=" .$nome.";host=" .$host, $usuario, $senha);
        } catch (PDOException $e) 
        {
            $msgErro = $e->getMessage();
        }
        

    }

    public function cadastrar($nome, $email, $senha)
    {
        global $pdo;
        
        //verificar se já existe 
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount() > 0) 
        {
            return false; //significa que já há um cadastro
        } 
        else //se ñ, cadastrar
        {      
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }
    }   

    public function logar($email, $senha)
    {
        global $pdo;

        //verifica se o email e senha já estão cadastrados
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0 )
        {
            $dado = $sql->fetch();  
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            
            return true; //login com sucesso
        }
        else
        {
            return false; //ñ foi possível fazer login
        }
    }

    
}
?>
