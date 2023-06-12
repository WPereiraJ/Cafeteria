<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../index.php");
    exit;
} else {
    $nomeUsuario = $_SESSION["nome"];
    $idUsuario = $_SESSION["id_usuario"];
    
    function getProfileImage($idUsuario)
    {
        $servername = "sql10.freemysqlhosting.net";
        $username = "sql10624365";
        $password = "XMdT1yBz3V";
        $dbname = "sql10624365";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        $sql = "SELECT imagem FROM imagem WHERE id_cliente = '$idUsuario'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $caminhoImagem = $row["imagem"];
        } else {
            $caminhoImagem = "uploads/default.jpg";
        }

        $conn->close();

        return $caminhoImagem;
    }

    $caminhoImagem = getProfileImage($idUsuario);
}
