<?php
  session_start();

  $logged = $_SESSION['logged'] ?? NULL;

  if ($logged) {
    header("Location: ../pages/my-profile.php");
  }
?>