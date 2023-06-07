<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o usuário está logado
    if (!isset($_SESSION["id_usuario"])) {
        // Redirecionar para a página de login ou exibir uma mensagem de erro
        header("Location: ../login.php");
        exit;
    }

    // Obtenha o id do usuário
    $idUsuario = $_SESSION["id_usuario"];

    $servername = "sql10.freemysqlhosting.net";
    $username = "sql10624365";
    $password = "XMdT1yBz3V";
    $dbname = "sql10624365";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Deletar a conta do usuário
    $sql = "DELETE FROM clientes WHERE id = '$idUsuario'";

    if ($conn->query($sql) === TRUE) {
        // Logout do usuário após deletar a conta
        session_destroy();
        header("Location: ../index.php");
        exit;
    } else {
        $erro = "Erro ao deletar a conta";
        header("Location: ../profile.php?erro=" . urlencode($erro));
    }
}
?>
