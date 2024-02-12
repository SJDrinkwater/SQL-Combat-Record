<?php
session_start();

$conn = mysqli_connect('localhost', 'sam.drinkwater', 'XWLC7MP7', 'samdrinkwater_database');

$player_id = $_SESSION["player_id"];

// Fetch the current statistics
$query = "SELECT wins, losses, kills, deaths, headshots FROM stats WHERE player_id = '$player_id'";
$result = mysqli_query($conn, $query);
$statistics = mysqli_fetch_assoc($result);

// Add the new input to the current statistics
$wins = $statistics['wins'] + $_POST['wins'];
$losses = $statistics['losses'] + $_POST['losses'];
$kills = $statistics['kills'] + $_POST['kills'];
$deaths = $statistics['deaths'] + $_POST['deaths'];
$headshots = $statistics['headshots'] + $_POST['headshots'];
$k_d = $kills / $deaths;

// Update the record in the "stats" table
$query = "UPDATE stats SET wins = '$wins', losses = '$losses', kills = '$kills', deaths = '$deaths', k_d = '$k_d', headshots = '$headshots' WHERE player_id = '$player_id'";
$result = mysqli_query($conn, $query);

if($result){
    echo "Statistics updated successfully";
} else {
    echo "Error updating statistics: " . mysqli_error($conn);
}
header("Location: update_rank.php");
mysqli_close($conn);
?>
