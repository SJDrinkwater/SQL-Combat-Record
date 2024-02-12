<?php
  session_start();
// Connect to the database
  $conn = mysqli_connect('localhost', 'sam.drinkwater', 'XWLC7MP7', 'samdrinkwater_database');

// Check if the form has been submitted
  if (isset($_POST['submit'])) {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $join_date = date("Y-m-d");

    // Insert the data into the database
    $player_query = "INSERT INTO players (username, email, password, date_of_birth, address, join_date) VALUES ('$username', '$email', '$password', '$date_of_birth', '$address', '$join_date')";
    $player_result = mysqli_query($conn, $player_query);

    $wins = 0;
    $losses = 0;
    $kills = 0;
    $deaths = 0;
    $k_d = $kills / $deaths;
    $headshots = 0;

    // Get the player_id of the recently inserted player
    $player_id = mysqli_insert_id($conn);
    $_SESSION['player_id'] = $player_id;

    // Insert the data into the stats table
    $stats_query = "INSERT INTO stats (player_id, wins, losses, kills, deaths, k_d, headshots) VALUES ($player_id, $wins, $losses, $kills, $deaths, 0, $headshots)";
    $stats_result = mysqli_query($conn, $stats_query);

    $rank = 0;

    $rank_query = "INSERT INTO rank(player_id, rank) VALUES ($player_id, $rank)";
    $rank_result = mysqli_query($conn, $rank_query);
    //player automatically assigned a pistol

    $weapon_query = "INSERT INTO player_weapons (player_id, weapon_id) VALUES ($player_id, 1)";
    $weapon_result = mysqli_query($conn, $weapon_query);

    mysqli_close($conn);

    // Redirect to the login page
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Registration</h1>
    <div class = "center-logo">
      <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br>
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth">
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        <br>
        <div class = "center-logo">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
      <br>
      <a href = login.php>Already have an account?</a> 
    </div>
</body>
</html>
