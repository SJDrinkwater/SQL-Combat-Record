<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'sam.drinkwater', 'XWLC7MP7', 'samdrinkwater_database');

// Retrieve the weapon_id linked to the player
$weapon_id_query = "SELECT weapon_id FROM player_weapons WHERE player_id = ".$_SESSION['player_id'];
$weapon_id_result = mysqli_query($conn, $weapon_id_query);
$weapon_id = mysqli_fetch_assoc($weapon_id_result)['weapon_id'];

// Retrieve the weapon details from the "weapons" table
$weapons_query = "SELECT weapon_name, weapon_type, damage, accuracy, image FROM weapons WHERE weapon_id = $weapon_id";
$weapons_result = mysqli_query($conn, $weapons_query);
$weapon = mysqli_fetch_assoc($weapons_result);

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $player_id = $_SESSION['player_id'];
    $weapon_id = $_POST['weapon_id'];

    // Update the player's weapon in the "player_weapons" table
    $query = "UPDATE player_weapons SET weapon_id = $weapon_id WHERE player_id = $player_id";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: dashboard.php");
    } else {
        echo "Error updating weapon: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Weapon Select</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Select Weapon</h1>
<div class = "center-logo">
 <form action="link_weapons.php" method="post">
    <label for="weapon_id">Select Weapon:</label>
    <select id="weapon_id" name="weapon_id">

        <?php
            // Connect to the database
            $conn = mysqli_connect('localhost', 'sam.drinkwater', 'XWLC7MP7', 'samdrinkwater_database');
            // Retrieve all the weapons from the "weapons" table
            $query = "SELECT weapon_id, weapon_name FROM weapons";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['weapon_id'] . "'>" . $row['weapon_name'] . "</option>";
            }
            mysqli_close($conn);
        ?>

    </select>
    <br>
    <input type="submit" name="submit" value="Update Weapon">
 </form>
</div>

</body>
</html>