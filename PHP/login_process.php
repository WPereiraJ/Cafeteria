<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $senha = $_POST["senha"];

  // Verificar no banco de dados se o login está correto
  $servername = "";
  $username = "";
  $password = "";
  $dbname = "";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
  }

  $sql = "SELECT id FROM clientes WHERE nome = '$nome' AND senha = '$senha'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idUsuario = $row["id"];

    session_start();

    // Armazenar informações do usuário na sessão
    $_SESSION["id_usuario"] = $idUsuario;
    $_SESSION["nome"] = $nome;

    // Redirecionar para a página do perfil
    header("Location: ../home.php");
    exit;
  } else {
    $erro = "Nome de usuário ou senha incorretos";
    header("Location: ../index.php?erro=" . urlencode($erro));
  }


  $conn->close();
}
