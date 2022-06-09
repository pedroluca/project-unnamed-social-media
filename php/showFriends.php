<?php
  session_start();
  $userID = $_SESSION['user_ID'];

  include_once "../php/databaseInformations.php";
  $con = mysqli_connect($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_password'], $_SESSION['db_name']);

  $searchFriends = "SELECT * FROM User INNER JOIN Friends ON User.user_ID = Friends.target_ID OR User.user_ID = Friends.requestor_ID WHERE Friends.acception_date IS NOT NULL AND Friends.requestor_ID = '$userID' OR Friends.target_ID = '$userID'";
  $queryResults = mysqli_query($con, $searchFriends);

  while ($row = mysqli_fetch_array($queryResults)) {
    if ($row['user_ID'] != $userID) {
      if ($row['requestor_ID'] === $userID) {
        echo "
          <div class='friend-card'>
            <img class='friend-profile-image' src='../images/{$row['profile_image_path']}.png'>
            <h3>{$row['U_name']}</h3>
          </div>";
      } else if ($row['target_ID'] === $userID) {
        echo "
          <div class='friend-card'>
            <img class='friend-profile-image' src='../images/{$row['profile_image_path']}.png'>
            <h3>{$row['U_name']}</h3>
          </div>";
      }
    }
  }

?>