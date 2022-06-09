<?php
  session_start();
  include_once "../php/verifyForValidUsers.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logomark.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Tomorrow:wght@400;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
  </head>
  <body>
    <nav class="navbar" id="navbar">
      <div class="nav-left">
        <a href="../index.html"><img src="../images/logomark.png" class="nav-logomark"/><span>Rede Social</span></a>
      </div>
      <ul class="nav-desktop">
        <li><a href="../index.html">Início</a></li>
        <li><a href="login.php" class="active">Entrar</a></li>
      </ul>
      <button class="btn-mobile" id="btn-mobile"><span class="hamburguer"></span></button>
      <ul class="nav-mobile">
        <li><a href="../index.html"><img src="../images/home.svg" class="nav-icons">Início</a></li>
        <li><a href="login.php" class="active"><img src="../images/profile.svg" class="nav-icons">Entrar</a></li>
      </ul>
    </nav>
    <main class="main-content">
      <section class="holder">
        <h1>Entrar com sua conta</h1>
        <section class="login-holder">
          <form action="../php/logIntoMyAccount.php" method="POST">
            <section>
              <label for="username">Nome de usuário:</label>
              <input type="text" name="username" id="username" placeholder="Ex: josedasilva" required>
            </section>
            <section>
              <label for="password">Senha:</label>
              <input type="password" name="password" id="password" placeholder="********" required>
              <p>Esqueceu sua senha? <a href="forgot-password.php">Clique aqui</a></p>
            </section>
            <section class="buttons">
              <button type="submit" class="btn-submit">Entrar</button>
              <button type="button" onclick="window.location.href = 'register.php'" class="btn-submit">Não tenho conta</button>
            </section>
          </form>
        </section>
      </section>
    </main>
    <footer class="footer">
      <section class="footer-left">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent placerat risus nisl, id volutpat nisi maximus dignissim. Nulla ipsum magna, laoreet non feugiat ac, tincidunt vitae arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque sit amet scelerisque magna. Aenean ornare condimentum urna, bibendum lobortis eros molestie vel.</p>
      </section>
      <section class="footer-right">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent placerat risus nisl, id volutpat nisi maximus dignissim. Nulla ipsum magna, laoreet non feugiat ac, tincidunt vitae arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque sit amet scelerisque magna. Aenean ornare condimentum urna, bibendum lobortis eros molestie vel.</p>
      </section>
      <section class="footer-bottom">
        <p>Created and developed by <a href="https://instagram.com/pedroluca.dev">Pedro Luca Prates</a></p>
      </section>
    </footer>
    <div id="message">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>
    <script src="../js/messageTimeOut.js"></script>
    <script src="../js/toggleMobileNavbar.js"></script>
  </body>
</html>