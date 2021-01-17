<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend 2 Homepage</title>
    <link rel="stylesheet" href="styles/screen.css">
</head>

<body>
    <div class="content">
        <nav>
            <div>
                <a href="/home.php">Introduction</a>
                <a href="/assignments.php">Assignments</a>
            </div>
        </nav>
        <h1>About Me</h1>
        <div class="aboutDiv">
            <img src="/images/IMG-2035.jpg" alt="Picture of me">
            <p>Hey all! My name is Bradford Hogge. I am a senior right now and am soooo close to finishing up school (I
                am pretty pumped about that). I am looking forward to learning
                more about web technologies!
            </p>
        </div>
        <?php echo "Today is " . date("D M d"); ?>
    </div>
</body>

</html>