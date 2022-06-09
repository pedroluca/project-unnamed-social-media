<?php
  session_start();

  $username = $_POST['username'];
  $email = $_POST['email'];
  $newPassword = $_POST['newPassword'];

  include_once "../php/databaseInformations.php";
  $con = mysqli_connect($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_password'], $_SESSION['db_name']);

  if ($_SESSION['passwordRecoverStep'] === 0) {
    $verifyUserAndEmail = "SELECT * FROM User WHERE username = '$username'";
    $queryResults = mysqli_query($con, $verifyUserAndEmail);
    $userData = mysqli_fetch_assoc($queryResults);

    if ($email === $userData['email']) {
      $_SESSION['passwordRecoverStep'] = 1;
      $_SESSION['user_ID'] = $userData['user_ID'];
      header("Location: ../pages/forgot-password.php");
    } else {
      $_SESSION['message'] = "<div class='alert error' role='alert'>O usuário ou email informados está inválido!</div>";
      $_SESSION['passwordRecoverStep'] = 0;
      header("Location: ../pages/forgot-password.php");
    }
  } else if ($_SESSION['passwordRecoverStep'] === 1) {
    $encryptedNewPassword = crypt($newPassword, '$6$rounds=5000$g3t0ut.H4ck/Tyk@23.1a4b89df');
    $changePassword = "UPDATE User SET U_password = '$encryptedNewPassword' WHERE user_ID = '{$_SESSION['user_ID']}'";

    if (mysqli_query($con, $changePassword)) {
      $_SESSION['message'] = "<div class='alert success' role='alert'>Senha atualizada com sucesso!</div>";
      $_SESSION['passwordRecoverStep'] = 0;
      header("Location: ../pages/login.php");
    } else {
      $_SESSION['message'] = "<div class='alert error' role='alert'>Ocorreu um erro ao tentar alterar sua senha. Por favor, tente novamente!</div>";
      $_SESSION['passwordRecoverStep'] = 0;
      header("Location: ../pages/forgot-password.php");
    }
  }
?>