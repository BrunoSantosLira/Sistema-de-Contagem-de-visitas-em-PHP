<?php
$conn = new PDO('mysql:host=localhost; dbname=banco_de_dados', 'root', '');

if (isset($_GET['site_id'])) {
    $site_id = intval($_GET['site_id']);

    //para inserir na lista de ativos, eu deleto da lista negra
    $query = "DELETE FROM lista_negra WHERE ID = $site_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    

}

?>