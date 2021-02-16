<?php
require "../../../db/dbAccess.php";
//$db = get_db();
var_dump($db);
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


foreach ($db->query('SELECT * FROM pokemon') as $row)
{
    echo "<p><strong>$pokemon_name: $pokemon_type - $pokemon_type2</strong><p>";
}

?>
    </select>
    <button type="submit">Submit Form</button>
    <form> 
</html>