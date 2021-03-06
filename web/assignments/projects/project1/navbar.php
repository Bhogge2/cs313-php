<nav class="navbar navbar-expand-lg navbar-light bg-light light-blue fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Pokemon Favorites</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="pokemon.php">Home</a>
                </li>
                <?php
                if (isset($_SESSION['username']) == false) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="signIn.php">Sign In / Sign Up</a>
                    </li>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['username'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="favorites.php">Favorites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signOut.php">Sign Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Welcome <?php echo $_SESSION['username']; ?>!</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>