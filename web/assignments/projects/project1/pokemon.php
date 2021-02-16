<?php
require "../../../db/dbAccess.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pokemon</title>
    </head>
    <body>
        <h1>Pokemon App</h1>
    </body>

    <form method="post" action="/">
    <p>Search by:</p>
    <label>Pokemon</label>
    <select name='pokemon_filter' id='pokemon_filter' required>
    <?php
    ?>
    </select>
    <button type="submit">Submit Form</button>
    <form> 
</html>