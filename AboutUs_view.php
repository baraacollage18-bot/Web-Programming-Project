<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>About us</title>
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
    </div>

    <div class="menu-overlay" id="menuOverlay"></div>

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