<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_SESSION["id_usuario"])) {
        header("Location: ../index.php");
        
    } else {
        $nomeUsuario = $_SESSION["nome"];
        $idUsuario = $_SESSION["id_usuario"];
        
        // Receber o arquivo enviado
        $foto = $_FILES["nova_foto"];

        // Verificar se o upload foi bem-sucedido
        if ($foto["error"] === UPLOAD_ERR_OK) {
            if (is_valid_image($foto["tmp_name"])) {
                $diretorio_destino = "uploads/";

                // Gerar um nome único para o arquivo
                $nome_arquivo = uniqid() . "_" . $foto["name"];

                // Mover o arquivo para o diretório de destino
                if (move_uploaded_file($foto["tmp_name"], $diretorio_destino . $nome_arquivo)) {
                        $servername = "";
                        $username = "";
                        $password = "";
                        $dbname = "";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                    }

                    $caminho_imagem = $diretorio_destino . $nome_arquivo;
                    $sql ="UPDATE imagem SET imagem = '$caminho_imagem' WHERE id_cliente = '$idUsuario'";

                    if ($conn->query($sql) === TRUE) {
                        $erro = "Imagem de perfil alterada com sucesso";
                        header("Location: ../profile.php?alert=" . urlencode($erro));
                    } else {
                        $erro = "Erro ao enviar o arquivo";
                        header("Location: ../profile.php?erro=" . urlencode($erro));
                    }
                } else {
                    $erro = "Erro ao fazer o upload da foto.";
                    header("Location: ../profile.php?erro=" . urlencode($erro));
                }
            } else {
                $erro = "Arquivo enviado não é uma imagem válida.";
                header("Location: ../profile.php?erro=" . urlencode($erro));
            }
        } else {
            $erro = "Erro no upload da foto.";
            header("Location: ../profile.php?erro=" . urlencode($erro));
        }
    }
}

// Função para verificar se é uma imagem válida
function is_valid_image($file)
{
    $mime_types = [
        "image/jpeg",
        "image/png",
        "image/gif"
    ];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file);
    finfo_close($finfo);

    return in_array($mime_type, $mime_types);
}
