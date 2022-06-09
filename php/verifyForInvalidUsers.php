<?php
  session_start();

  $logged = $_SESSION['logged'] ?? NULL;

  if (!$logged) {
    $_SESSION['message'] = "<div class='alert error' role='alert'>O usuário precisa estar logado para acessar esta página!</div>";
    header("Location: ../pages/login.php");
  }
?>