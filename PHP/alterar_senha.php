<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_SESSION["id_usuario"];
    $senhaAtual = $_POST["senha_atual"];
    $novaSenha = $_POST["nova_senha"];

    $servername = "sql10.freemysqlhosting.net";
    $username = "sql10624365";
    $password = "XMdT1yBz3V";
    $dbname = "sql10624365";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT senha FROM clientes WHERE id = '$idUsuario'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $senhaArmazenada = $row["senha"];

        // Verificar se a senha atual corresponde à senha armazenada
        if ($senhaAtual == $senhaArmazenada) {
            // Verificar se uma nova senha foi fornecida
            if (!empty($novaSenha)) {
                // Atualizar a senha no banco de dados
                $sql = "UPDATE clientes SET senha = '$novaSenha' WHERE id = '$idUsuario'";
                if ($conn->query($sql) === TRUE) {
                    $erro = "Senha alterada com sucesso";
                    header("Location: ../profile.php?erro=" . urlencode($erro));
                    exit;
                } else {
                    $erro = "Erro ao alterar senha";
                    header("Location: ../profile.php?erro=" . urlencode($erro));
                }
            } else {
                $erro = "Nenhuma nova senha fornecida";
                header("Location: ../profile.php?erro=" . urlencode($erro));
            }
        } else {
            $erro = "Senhas não são compatíveis";
            header("Location: ../profile.php?erro=" . urlencode($erro));
        }
    } else {
        $error = "Usuário não encontrado";
        header("Location: ../profile.php?erro=" . urlencode($erro));
        exit;
    }
}
