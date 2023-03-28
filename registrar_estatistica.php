<?php
date_default_timezone_set('America/Sao_Paulo');

require "./bibliotecas/PHPMailer/Exception.php";
require "./bibliotecas/PHPMailer/OAuth.php";
require "./bibliotecas/PHPMailer/PHPMailer.php";
require "./bibliotecas/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exception
//---- ESSE CÓDIGO SÓ DEVERÁ SER EXECUTADO UMA ÚNICA VEZ AO DIA.---------------
// Conecta ao banco de dados MySQL



$conexao = new PDO('mysql:host=localhost; dbname=banco_de_dados', 'root', '');

// Recupera a data atual
$data = date('d/m/Y');


//seleciona dados da tabela clicks2
$query = "SELECT site_id,email,referrer, COUNT(*) AS acessos FROM clicks2 GROUP BY site_id;";
$stmt= $conexao->prepare($query);
$stmt->execute();

$acessos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

//Para cada registro, adicione-o na tabela de registros diários
foreach($acessos as $indice  => $dominio) {
    $qtd_acessos = $dominio['acessos'];
    $proprietario = $dominio['email'];

    $sql = "INSERT INTO estatisticas_diarias (proprietario, data, visitantes) VALUES ('$proprietario','$data', $qtd_acessos)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();


 }

$query2 = "SELECT * FROM estatisticas_diarias WHERE data = '$data'";
$stmt2 = $conexao->prepare($query2);
$stmt2->execute();

$result = $stmt2->fetchAll(\PDO::FETCH_ASSOC);

foreach($result as $key => $estatistica){
    $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = false;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com ';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'testeemailsend25@gmail.com';                     //SMTP username
            $mail->Password   = 'slcnevwtqztvkzxe';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;
            $mail->setLanguage('pt');
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('testeemailsend25@gmail.com', 'Bruno');
            $mail->addAddress($estatistica['proprietario']);     //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'oláaa';
            $mail->Body    = 'Boa noite';
            $mail->AltBody = 'Por favor, utilize um client que tenha suporte a HTML para ver o restante do conteúdo.';

            $mail->send();

        } 
        catch (Exception $e) {
        } 
    
}




?>