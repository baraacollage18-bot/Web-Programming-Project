<!doctype html>
<html>

<head>
    <title><?php echo htmlspecialchars($watch['name']); ?></title>
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

    <section class="watch-layout">


        <div class="watch-panel">
            <div class="image-panel">
                <img src="<?php echo htmlspecialchars($watch['image']); ?>"
                    alt="<?php echo htmlspecialchars($name['name']); ?>">
            </div>
        </div>


        <div class="watch-right">
            <p class="watch-brand"><?php echo htmlspecialchars($watch['brand_name']); ?></p>
            <h1 class="watch-name"><?php echo htmlspecialchars($watch['name']); ?></h1>

            <div class="watch-section">
                <h4>Description</h4>
                <p><?php echo htmlspecialchars($watch['description']); ?></p>
            </div>

            <div class="watch-section">
                <h4>Price</h4>
                <p><?php echo htmlspecialchars($watch['price']); ?> EGP</p>
            </div>

            <div class="watch-section">
                <h4>Stock</h4>
                <p><?php echo htmlspecialchars($watch['stock']); ?> Available</p>
            </div>

            <form action="add_to_cart.php" method="POST" class="cart-form">
                <input type="hidden" name="watch_id" value="<?php echo $watch['id']; ?>">

                <select name="quantity" class="quantity-select" <?= ($watch['stock'] == 0) ? 'disabled' : '' ?>>

                    <?php
                        $max = min($watch['stock'], 10);
                        for ($i = 1; $i <= $max; $i++): ?>
                    <option value="<?= $i ?>">
                        <?= str_pad($i, 2, "0", STR_PAD_LEFT) ?>
                    </option>
                    <?php endfor; ?>

                </select>

                <button type="submit" class="add-cart-btn" <?php if ($watch['stock'] == 0) echo 'disabled'; ?>>
                    <?php echo ($watch['stock'] == 0) ? 'Out of Stock' : 'Add to Cart'; ?>
                </button>
            </form>
        </div>
    </section>

    <div id="toast" class="toast">Added to cart ✓</div>

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
    const form = document.querySelector(".cart-form");
    const toast = document.getElementById("toast");

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        toast.classList.add("show");

        setTimeout(() => {
            form.submit();
        }, 700);
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