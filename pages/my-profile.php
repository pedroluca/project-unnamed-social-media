<?php
  session_start();
  include_once "../php/logUserOut.php";
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
    <title>Meu Perfil | @<?php echo $_SESSION['username']?></title>
  </head>
  <body>
    <nav class="navbar" id="navbar">
      <div class="nav-left">
        <a href="../index.html"><img src="../images/logomark.png" class="nav-logomark"/><span>Rede Social</span></a>
      </div>
      <ul class="nav-desktop">
        <li><a href="../index.html">Início</a></li>
        <li><a href="friends.php">Amigos</a></li>
        <li>
          <a class="profile-dropdown" onclick="myFunction()">
            <?php echo $_SESSION['username'] ?>
            <img src="../images/down-arrow.svg" class="dropdown-arrow">
          </a>
        </li>
        <div id="myDropdown" class="dropdown-content">
          <a href="my-profile.php" class="active2"><img src="../images/profile.svg" class="nav-icons">Meu Perfil</a>
          <a href="settings.php"><img src="../images/settings.svg" class="nav-icons">Configurações</a>
          <a href="?logout=1"><img src="../images/log-out.svg" class="nav-icons">Sair</a>
        </div>
      </ul>
      <button class="btn-mobile" id="btn-mobile"><span class="hamburguer"></span></button>
      <ul class="nav-mobile">
        <li><a href="../index.html"><img src="../images/home.svg" class="nav-icons">Início</a></li>
        <li><a href="friends.php"><img src="../images/friends.svg" class="nav-icons">Amigos</a></li>
        <li><a href="my-profile.php" class="active"><img src="../images/profile.svg" class="nav-icons">Meu Perfil</a></li>
        <li><a href="settings.php"><img src="../images/settings.svg" class="nav-icons">Configurações</a></li>
        <li><a href="?logout=1"><img src="../images/log-out.svg" class="nav-icons">Sair</a></li>
      </ul>
    </nav>
    <main class="main-content">
      <section class="holder">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent placerat risus nisl, id volutpat nisi maximus dignissim. Nulla ipsum magna, laoreet non feugiat ac, tincidunt vitae arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque sit amet scelerisque magna. Aenean ornare condimentum urna, bibendum lobortis eros molestie vel. Pellentesque non nibh semper, blandit felis sed, pellentesque est. Duis eleifend nibh odio, quis vehicula elit accumsan ac. Cras viverra nunc in ornare dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
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
      include_once "../php/verifyForInvalidUsers.php";
      ?>
    </div>
    <script src="../js/messageTimeOut.js"></script>
    <script src="../js/toggleMobileNavbar.js"></script>
    <script src="../js/toggleProfileDropdownMenu.js"></script>
  </body>
</html>