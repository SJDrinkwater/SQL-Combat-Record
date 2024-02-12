<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'sam.drinkwater', 'XWLC7MP7', 'samdrinkwater_database');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match those in the database
    $login_query = "SELECT * FROM players WHERE username = '$username'";
    $login_result = mysqli_query($conn, $login_query);
    $user = mysqli_fetch_assoc($login_result);
    if (password_verify($password, $user['password'])) {
        // Log the user in
        $_SESSION['player_id'] = $user['player_id'];
        $last_login = date('Y-m-d H:i:s');
        // update the last_login column
        $update_query = "UPDATE players SET last_login = '$last_login' WHERE player_id = '$user[player_id]'";
        mysqli_query($conn, $update_query);
        // Redirect to the dashboard
        header("Location: dashboard.php");
    } else {
        // Show an error message
        echo "Incorrect username or password. Please try again.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Login</h1>
    <div class = "center-logo">
      <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br>
        <div class = "center-logo">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <br>
      <a href = register.php>Don't have an account?</a> 
    </div>
</body>
</html>