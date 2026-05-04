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
            <button class="cart-btn" id="cartBtn">
                <img src="assets_img/cart-svgrepo-com.svg" class="cart-icon">
            </button>
        </div>

        <div class="nav-right">
            <div class="logo">
                <img src="assets_img/Velmora-logo.svg">
            </div>

            <button class="menu-btn" id="menuBtn">☰</button>
        </div>
    </nav>
    <?php include 'cart_panel.php'; ?>

    <div class="side-menu" id="sideMenu">
        <button class="close-btn" id="closeMenu"></button>

        <a href="index.php">Home</a>
        <a href="SignIn.php">Sign in</a>
        <a href="SignUp.php">Sign up</a>
        <a href="AboutUs.php">About us</a>
        <a href="Account.php">Account</a>
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

    <script>
    const cartBtn = document.getElementById("cartBtn");
    const cartPanel = document.getElementById("cartPanel");
    const closeCart = document.getElementById("closeCart");
    const cartOverlay = document.getElementById("cartOverlay");
    const continueShopping = document.getElementById("continueShopping");

    cartBtn.addEventListener("click", () => {
        cartPanel.classList.add("active");
        cartOverlay.classList.add("active");
    });

    closeCart.addEventListener("click", () => {
        cartPanel.classList.remove("active");
        cartOverlay.classList.remove("active");
    });

    cartOverlay.addEventListener("click", () => {
        cartPanel.classList.remove("active");
        cartOverlay.classList.remove("active");
    });

    continueShopping.addEventListener("click", () => {
        cartPanel.classList.remove("active");
        cartOverlay.classList.remove("active");
    });
    </script>
</body>

</html>