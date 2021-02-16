<?php
require "../../../db/dbAccess.php";
$db = get_db();
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
// Notice that we avoid using "SELECT *" here. This is considered
// good practice so we don't inadvertently bring back data we don't
// want, especially if the database changes later.
$statement = $db->prepare("SELECT * FROM pokemon");
$statement->execute();

// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	$pokemon_name = $row['pokemon_name'];
	$pokemon_type = $row['pokemon_type'];
	$pokemon_type2 = $row['pokemon_type2'];

	echo "<p><strong>$pokemon_name: $pokemon_type - $pokemon_type2</strong><p>";
}

?>
    </select>
    <button type="submit">Submit Form</button>
    <form> 
</html>