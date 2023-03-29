<?php 
$conexao = new PDO('mysql:host=localhost; dbname=banco_de_dados', 'root', '');

if(isset($_GET['metodo']) && $_GET['metodo'] == 'adicionar'){
    try{

        $query = "INSERT INTO usuarios(email,senha) VALUES (:email, :senha)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue('email', $_POST['email']);
        $stmt->bindValue('senha', md5($_POST['senha']));
        $stmt->execute();
        header('Location: /adicionar.php?status=sucesso');

    }catch(PDOException $e){
        if($e->getCode() == 23000){
            header('Location: /adicionar.php?status=erro_email');
        };
    };
};

if(isset($_GET['metodo']) && $_GET['metodo'] == 'login'){
    try{
        $query = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue('email', $_POST['email']);
        $stmt->bindValue('senha', md5($_POST['senha']));
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if(empty($result)){
            header('Location: /login.php?status=acesso_nao_encontrado');
        }else{
            session_start();
            $_SESSION['username'] = $result['email'];
            header('Location: /index.php');
        };

    }catch(PDOException $e){
        echo 'ERRO DETECTADO!!!';
    };

}

if(isset($_GET['metodo']) && $_GET['metodo'] == 'sair'){
    session_start();
    session_destroy();
    header("Location: /index.php");
}

?>