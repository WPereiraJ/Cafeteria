<!DOCTYPE html>
<html lang="pt-br" class="cafe1">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café,teria?</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/estilo_login.css">
</head>
<body class="cafe1">
    <header>
        <h1>Café,teria?</h1>
    </header>
    <Section class="section">
        <div id="div1">
            <form action="PHP/register_process.php" method="POST">
                <?php
      if (isset($_GET["erro"])) {
        $erro = $_GET["erro"];
        echo "<p class='error-message'>$erro</p>";
      }
      ?>
                Nome:<p><input type="text" name ="nome" placeholder="Insira um nome" required></p>
                Senha: <p><input type="password" name="senha" placeholder="Digite uma senha" required></p>
                Confirmar senha: <p><input type ="password" name="confirmar" placeholder="Confirmar senha" required></p>
                Email: <p><input type="email" name="email" placeholder="Insira um email" required></p>
                <button  type="submit" class="button"> Cadastrar
            </form>
        </div>
        <div id="div2">
            <a href="index.php" class="a">Já é cadastrado? Clique aqui!</a>
        </div>
    </Section>
    <script src="script/script.js"></script>
    <footer>
        <p>&copy; Café,teria?</p>
    </footer>
</body>
</html>