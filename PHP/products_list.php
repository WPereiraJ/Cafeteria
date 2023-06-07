<?php

$servername = "sql10.freemysqlhosting.net";
$username = "sql10624365";
$password = "XMdT1yBz3V";
$dbname = "sql10624365";

$conn = new mysqli($servername, $username, $password, $dbname);

/*if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
echo 'conexão realizada';*/

/*$sql = "CREATE TABLE produto (
        id_produto INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome_produto VARCHAR(50) NOT NULL,
        preco_produto DECIMAL(10.2) NOT NULL)";

if ($conn->query($sql) === TRUE) {
 echo "Tabela PRODUTO criada com sucesso<br>";
 } else {
 echo "Erro na criação da tabela PRODUTO: " . $conn->error."<br>";
 }*/

/*$sql = "INSERT INTO produto (`id_produto`, `nome_produto`, `preco_produto`) VALUES
       (NULL, 'croassaint', '7.00'), 
       (NULL, 'cappuccino', '9.50'), 
       (NULL, 'coxinha', '5.00'), 
       (NULL, 'triplo_cacau', '18.00'), 
       (NULL, 'banoffe_vegano', '20.00'), 
       (NULL, 'empadinha', '5.00'), 
       (NULL, 'expresso', '6.00'), 
       (NULL, 'bomba_ganache', '12.00'), 
       (NULL, 'bubble_tea', '10.50')";*/


 $conn->close();