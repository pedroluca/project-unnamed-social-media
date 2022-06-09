<?php
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  include_once "../php/databaseInformations.php";
  $con = mysqli_connect($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_password'], $_SESSION['db_name']);
  
  $verifyUser = "SELECT * FROM User WHERE username = '$username'";
  $queryResults = mysqli_query($con, $verifyUser);
  $userData = mysqli_fetch_assoc($queryResults);

  if ($username === $userData['username']) {
    $encryptedPassword = crypt($password, '$6$rounds=5000$g3t0ut.H4ck/Tyk@23.1a4b89df');
    
    if ($encryptedPassword === $userData['U_password']) {
      $_SESSION['logged'] = True;
      $_SESSION['user_ID'] = $userData['user_ID'];
      $_SESSION['username'] = $userData['username'];
      $_SESSION['name'] = $userData['U_name'];
      $_SESSION['profile_image_path'] = $userData['profile_image_path'];
      $_SESSION['message'] = "<div class='alert success' role='alert'>Usuário {$_SESSION['username']} entrou com sucesso!</div>";
      header("Location: ../pages/my-profile.php");
    } else {
      if ($_SESSION['passwordIncorrectAttempts'] >= 3) {
        $_SESSION['message'] = "<div class='alert error' role='alert'>Muitas tentativas de login, experimente o <br> botão 'Esqueci minha senha'!</div>";
        $_SESSION['passwordIncorrectAttempts'] = 0;
        header("Location: ../pages/login.php");
      } else {
        $_SESSION['passwordIncorrectAttempts'] += 1;
        $_SESSION['message'] = "<div class='alert error' role='alert'>Usuário ou senha incorretos! Tente novamente</div>";
        // echo $incorrectPasswordAttempts;
        header("Location: ../pages/login.php");
      }
    }
  }
?>