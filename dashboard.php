<!DOCTYPE html>
<html>
<head>
    <title>Player Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="logout.php">[Log out]</a>
<?php
    session_start();
    // Connect to the database
    $conn = mysqli_connect('localhost', 'sam.drinkwater', 'XWLC7MP7', 'samdrinkwater_database');

    // Get the player_id
    $player_id = $_SESSION['player_id'];
 
    // Select the username for the specific player
    $player_query = "SELECT * FROM players WHERE player_id = $player_id";
    $player_result = mysqli_query($conn, $player_query);
    $player = mysqli_fetch_assoc($player_result);
    mysqli_free_result($player_result);


    $rank_query = "SELECT rank FROM rank WHERE player_id = $player_id";
    $rank_result = mysqli_query($conn, $rank_query);
    $rank = mysqli_fetch_assoc($rank_result);
    mysqli_free_result($rank_result);


    $stats_query = "SELECT * FROM stats WHERE player_id = $player_id";
    $stats_result = mysqli_query($conn, $stats_query);
    $stats = mysqli_fetch_assoc($stats_result);
    mysqli_free_result($stats_result);


    // Retrieve the weapon_id linked to the player
    $weapon_id_query = "SELECT weapon_id FROM player_weapons WHERE player_id = $player_id";
    $weapon_id_result = mysqli_query($conn, $weapon_id_query);
    $weapon_id = mysqli_fetch_assoc($weapon_id_result)['weapon_id'];

    // Retrieve the weapon details from the "weapons" table
    $weapons_query = "SELECT weapon_name, weapon_type, damage, accuracy, image FROM weapons WHERE weapon_id = $weapon_id";
    $weapons_result = mysqli_query($conn, $weapons_query);
    $weapon = mysqli_fetch_assoc($weapons_result);
  
    mysqli_close($conn);
    
?>
<body>
  <br> <br> <br>
  <div class = "center-logo">
    <img src = "Counter-logo.jpg" style = "height:150px">
  </div> 
  <div id="change">
      <nav class="navMenu">
        <a href="stats.html">[Edit Player Stats]</a>
        <a href="link_weapons.php">[Change Players Weapon]</a>
      </nav> 
  </div>
  <br>
  <div id = "border">
    <h2>Welcome Player "<?php echo $player['username']; ?>"</h2>
    <h3><u>Here's you're Player Info</u></h3>
    <br>
    <p>Username: <?php echo $player['username']; ?></p>
    <p>Email: <?php echo $player['email']; ?></p>
    <p>Date of Birth: <?php echo $player['date_of_birth']; ?></p>
    <p>Address: <?php echo $player['address']; ?></p>
    <br>
    <h3><u>In Game Stats</u></h3>
    <br>
    <p>Player Rank: <?php echo $rank['rank']; ?></p>
    <br>
    <p>Player Wins: <?php echo $stats['wins']; ?></p>
    <p>Player Losses: <?php echo $stats['losses']; ?></p>
    <p>Player Kills: <?php echo $stats['kills']; ?></p>
    <p>Player Deaths: <?php echo $stats['deaths']; ?></p>
    <p>Player Headshots: <?php echo $stats['headshots']; ?></p>
    <p>Player K/D: <?php echo $stats['k_d']; ?></p>
    <br>
    <h3><u>Your Weapon of Choice</u></h3>
    <br>
    <p>Weapon Name: <?php echo $weapon['weapon_name']; ?></p>
    <p>Weapon Type: <?php echo $weapon['weapon_type']; ?></p>
    <p>Weapon Damage: <?php echo $weapon['damage']; ?></p>
    <p>Weapon Accuracy: <?php echo $weapon['accuracy']; ?></p>
    <img src="<?php echo $weapon['image'];?>" style = "width: 300px;">
  </div>

  

</body>
</html>