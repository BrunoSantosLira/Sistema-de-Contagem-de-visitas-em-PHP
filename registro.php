<?php
// Conectar no banco de dados
$conn = new mysqli("localhost", "root", "", "banco_de_dados");

// Verificar se o parâmetro site_id foi enviado
if (isset($_GET['site_id'])) {
  // Obter o site_id do parâmetro
  $site_id = intval($_GET['site_id']);
  $referrer = $_GET['referrer'];
  $ip = $_SERVER['REMOTE_ADDR'];

  // Inserir um novo registro na tabela de clicks
  $sql = "INSERT INTO clicks2 (referrer,ip, site_id, clicked_at ) VALUES ($referrer,'$ip', $site_id,NOW())";
  $conn->query($sql);
}
?>