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
            <form action="PHP/login_process.php" method="POST">
       <?php
      if (isset($_GET["erro"])) {
        $erro = $_GET["erro"];
        echo "<p class='error-message'>$erro</p>";
      }
      echo 'Entre com seu Login'.'</br>';
      ?>    
        <br>
                <div class="form-floating">
                Nome:<p><input type="text" class="" name ="nome" placeholder="Insira seu nome" required></p>
                Senha: <p><input type="password" class="rounded-pill" name="senha" placeholder="Digite sua senha" required></p>
                <button  type="submit" class="button"> Login
            </form>
        </div>
        <div id="div2">
            <a href="cadastro.php" class="a">Não é cadastrado? Clique aqui!</a>
        </div>
    </Section>
    <footer>
        <p>&copy; Café,teria?</p>
    </footer>
</body>
</html>