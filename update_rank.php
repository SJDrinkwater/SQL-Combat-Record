<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'sam.drinkwater', 'XWLC7MP7', 'samdrinkwater_database');

// Get the player_id
$player_id = $_SESSION['player_id'];

// Retrieve the player's wins, losses, and kills from the "stats" table
$query = "SELECT wins, losses, kills, deaths, headshots FROM stats WHERE player_id = $player_id";
$result = mysqli_query($conn, $query);
$stats = mysqli_fetch_assoc($result);

$wins = $stats['wins'];
$losses = $stats['losses'];
$kills = $stats['kills'];
$deaths = $stats['deaths'];
$headshots = $stats['headshots'];

// Calculate the new rank based on the criteria
$new_rank = calculate_rank($wins, $losses, $kills, $deaths, $headshots);

// Update the player's rank in the "rank" table
$query = "UPDATE rank SET rank = '$new_rank' WHERE player_id = '$player_id'";
$result = mysqli_query($conn, $query);

// Function to calculate the rank
function calculate_rank($wins, $losses, $kills, $deaths, $headshots) {
    // Example calculation for rank
    // You can change this to whatever calculation you want
    $losses = $losses > 0 ? $losses : 1; 
    $rank = ($wins*2) + ($kills / 10) + ($headshots/4) / $losses;
    return $rank;
}
header("Location: dashboard.php");
mysqli_close($conn);