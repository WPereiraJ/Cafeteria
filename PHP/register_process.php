<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recuperar os valores do formulário
  $nome = $_POST["nome"];
  $senha = $_POST["senha"];
  $confirmarSenha = $_POST["confirmar"];
  $email = $_POST["email"];
  
  if ($senha !== $confirmarSenha) {
    $erro = "As senhas não correspondem. Por favor, tente novamente.";
    header("Location: ../cadastro.php?erro=" . urlencode($erro));
    // echo "<script>alert('$erro')window.location.href = ../cadastro.php;</script>";
    exit();
  }

    $servername = "sql10.freemysqlhosting.net";
    $username = "sql10624365";
    $password = "XMdT1yBz3V";
    $dbname = "sql10624365";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}       
        
$sql = "INSERT INTO clientes (nome,senha,email) VALUES ('$nome', '$senha', '$email')";
if ($conn->query($sql)===TRUE){
    $erro = "Seu cadastro foi feito com sucesso";
    header("Location: ../cadastro.php?erro=" . urlencode($erro));
    // echo "<script>alert('$sucess'); window.location.href='../login.php'</script>";
} else {
 echo "Erro: " . $sql . "<br>" . $conn->error."<br>";
 }

}
$conn ->close();