<?php 
$conn = new PDO('mysql:host=localhost; dbname=banco_de_dados', 'root', '');


if (isset($_GET['site_id'])) {
    $site_id = intval($_GET['site_id']);
    $referrer = $_GET['referrer'];
    $email = $_GET['email'];

    $sql= "SELECT * FROM `lista_negra` WHERE ID = $site_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $teste = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    if(empty($teste)){          
        $sql = "INSERT INTO lista_negra (ID,email,referrer ) VALUES ($site_id,'$email',$referrer)";
        $conn->query($sql);
    }



}

?>