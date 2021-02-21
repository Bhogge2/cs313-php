<?php
require "dbAccess.php";
$db = get_db();
?>

<?php
session_start();

if(isset($_SESSION['user_id']))
{
    
}
else{
    header("Location: signIn.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pokemon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="api.css">
    <script src="favorites.js"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1 style="text-align:center; color: white; text-shadow: 2px 2px 5px black; margin-top: 70px;">Your Favorite Pokemon</h1>
        <div class="listBox">
            <ul id="favoritesList">
                <?php
                $statement = $db->prepare("SELECT pokemon_id FROM user_favorites WHERE user_id=:userId");
                $statement->bindValue(':userId', $_SESSION['user_id']);
                $statement->execute();

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $pokemonId = $row['pokemon_id'];

                    echo '<script type="text/javascript">',
                    'getFavoritePokemon(' . $pokemonId . ');',
                    '</script>';
                }

                ?>
            </ul>
        </div>
    </div>

</html>

</body>