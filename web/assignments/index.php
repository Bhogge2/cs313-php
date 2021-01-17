<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend 2 Homepage</title>
    <link rel="stylesheet" href="/styles/screen.css">
</head>

<body>
    <div class="content">
        <nav>
            <div>
                <a href="/home.php">Introduction</a>
                <a href="/assignments/index.php">Assignments</a>
            </div>
        </nav>
        
        <?php echo "Today is " . date("D M d"); ?>
    </div>
</body>

</html>