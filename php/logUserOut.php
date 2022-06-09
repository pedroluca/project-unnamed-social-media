<?php
  session_start();

  if (isset($_GET['logout']) && $_GET['logout'] == 1){
    $_SESSION = array();
    session_unset();
    session_destroy();
    header('Location: ../index.html');
  }
?>