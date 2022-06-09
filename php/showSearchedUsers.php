<?php
  session_start();
  $userID = $_SESSION['user_ID'];
  $pesquisa = $_REQUEST['q'];

  include_once "../php/databaseInformations.php";
  $con = mysqli_connect($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_password'], $_SESSION['db_name']);

  $searchFriends = "SELECT * FROM User WHERE U_name LIKE '%{$pesquisa}%' ORDER BY U_name";
  $queryResults = mysqli_query($con, $searchFriends);

  while ($row = mysqli_fetch_array($queryResults)) {
    if ($row['user_ID'] != $userID) {
      echo "<div class='friend-card'>
              <img class='friend-profile-image' src='../images/default.png'>
              <h3>chegou1</h3>
            </div>";
    }

    $verifyFriendship = "SELECT * FROM Friends WHERE target_ID = '$row['user_ID']' OR requestor_ID = '$row['user_ID']' AND acception_date IS NULL";
    $newQueryResults = mysqli_query($con, $verifyFriendship);
    $newRow = mysqli_fetch_array($newQueryResults);
    echo "<div class='friend-card'>
            <img class='friend-profile-image' src='../images/default.png'>
            <h3>chegou2</h3>
          </div>";
    echo $newRow;
    // if (!empty($newRow)) {
    //   if ($row['user_ID'] != $userID) {
    //     echo "<div class='friend-card'>
    //             <img class='friend-profile-image' src='../images/{$row['profile_image_path']}.png'>
    //             <h3>{$row['U_name']}</h3>
    //           </div>";
    //   }
    // }
  }

?>