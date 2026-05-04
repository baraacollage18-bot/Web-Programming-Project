<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>SignIn Page</title>
    <link rel="stylesheet" href="Styles.css" />
</head>

<body>
    <nav class="navbar">
        <div class="nav-left">
        </div>

        <div class="nav-right">
            <div class="logo">
                <img src="assets_img/Velmora-logo.svg">
            </div>

            <button class="menu-btn" id="menuBtn">☰</button>
        </div>
    </nav>

    <div class="side-menu" id="sideMenu">
        <button class="close-btn" id="closeMenu"></button>

        <a href="index.php">Home</a>
        <a href="SignIn.php">Sign in</a>
        <a href="SignUp.php">Sign up</a>
        <a href="AboutUs.php">About us</a>
        <a href="Account.php">Account</a>
    </div>

    <div class="menu-overlay" id="menuOverlay"></div>

    <h2 class="main-title">Sign in</h2>
    <div class="form-container">


        <?php if(isset($_GET['error'])): ?>
        <p>Wrong email or password</p>
        <?php endif; ?>

        <form action="SignIn.php" method="POST">
            <!-- Email -->
            <label for="Email"><b>Email:</b></label><br />
            <input type="Email" id="Email" name="Email" class="input-field" /><br /><br />

            <!-- Password -->
            <label for="Password"><b>Password:</b></label><br />
            <input type="password" id="Password" name="Password" class="input-field" /><br /><br />

            <button type="submit" class="btn">
                <b>Sign in</b>
            </button>
        </form>
    </div>

    <script>
    const menuBtn = document.getElementById("menuBtn");
    const sideMenu = document.getElementById("sideMenu");
    const closeMenu = document.getElementById("closeMenu");
    const menuOverlay = document.getElementById("menuOverlay");

    menuBtn.addEventListener("click", () => {
        sideMenu.classList.add("active");
        menuOverlay.classList.add("active");
    });

    closeMenu.addEventListener("click", () => {
        sideMenu.classList.remove("active");
        menuOverlay.classList.remove("active");
    });

    menuOverlay.addEventListener("click", () => {
        sideMenu.classList.remove("active");
        menuOverlay.classList.remove("active");
    });
    </script>
</body>

</html>