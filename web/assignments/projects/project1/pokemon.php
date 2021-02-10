<?php
require "../web/db/dbAccess.php";

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
       $pokemon_array = array();
       //Search for all the books in the DB 
       foreach ($db->query ('SELECT DISTINCT pokemon_name FROM pokemon') as $row )
       {
           //Add book to the book array if it has not been added 
          if(!(in_array($row['pokemon_name'], $pokemon_array)))
          {
              array_push($pokemon_array, $row['pokemon_name']);
          }
       }
       //loop the books_array variable to create an option for each book 
       foreach ($pokemon_array as $pokemon_in_array )
       {
        echo '<option value="' . $pokemon_in_array . '">' .  $pokemon_in_array . '</option>';
       }
    ?>
    </select>
    <button type="submit">Submit Form</button>
    <form> 
</html>