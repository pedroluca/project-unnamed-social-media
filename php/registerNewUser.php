<?php 
  session_start();

  $name = $_POST['name'];
  $email = $_POST['email'];
  $birthday = $_POST['birthday'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $today = new DateTime('now');
  $userBirth = new DateTime($birthday);
  $interval = $today -> diff($userBirth);
  $age = $interval -> y;

  include_once "../php/databaseInformations.php";
  $con = mysqli_connect($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_password'], $_SESSION['db_name']);

  $verifyUserExistence = "SELECT username FROM User WHERE username = '$username'";
  $queryResults = mysqli_query($con, $verifyUserExistence);
  $userData = mysqli_fetch_assoc($queryResults);

  if ($username === $userData['username']) {
    $_SESSION['message'] = "<div class='alert error' role='alert'>Usuário já existente! Experimente outro.</div>";
    header("Location: ../pages/register.php");
  } else {
    $encryptedPassword = crypt($password, '$6$rounds=5000$g3t0ut.H4ck/Tyk@23.1a4b89df');

    if (mysqli_connect_errno()) {
      echo "Erro: " . mysqli_connect_error();
    } else {
      $databaseRegister = "INSERT INTO User (U_name, username, email, birth_date, age, U_password, profile_image_path) VALUES ('$name', '$username', '$email', '$birthday', '$age', '$encryptedPassword', 'default')";

      if (mysqli_query($con, $databaseRegister)) {
        $_SESSION['message'] = "<div class='alert success' role='alert'>Usuário cadastrado!</div>";
        header("Location: ../pages/login.php");
      } else {
        $_SESSION['message'] = "<div class='alert error' role='alert'>Usuário ou senha inválidos!</div>";
        header("Location: ../pages/register.php");
      }

      mysqli_close($con);
    }
  }
?>