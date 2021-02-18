<?php
require "dbAccess.php";
$db = get_db();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pokemon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Pokemon App</h1>

        <form method="post" action="/">
            <p>Search by:</p>
            <label>Pokemon</label>
            <select name='pokemon_filter' id='pokemon_filter' required>
                <option value="$pokemon_name"></option>
                <?php
                // Notice that we avoid using "SELECT *" here. This is considered
                // good practice so we don't inadvertently bring back data we don't
                // want, especially if the database changes later.
                $statement = $db->prepare("SELECT * FROM pokemon");
                $statement->execute();

                // Go through each result
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    // The variable "row" now holds the complete record for that
                    // row, and we can access the different values based on their
                    // name
                    $pokemon_name = $row['pokemon_name'];
                    $pokemon_type = $row['pokemon_type'];
                    $pokemon_type2 = $row['pokemon_type2'];

                    echo "<option value=" . $pokemon_name . ">" . $pokemon_name . "</option>";
                }

                ?>
            </select>
            <button type="submit">Submit Form</button>
        </form>
    </div>

</html>

</body>