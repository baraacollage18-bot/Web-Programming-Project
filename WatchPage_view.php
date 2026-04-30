<!doctype html>
<html>

<head>
    <title><?php echo htmlspecialchars($watch['name']); ?></title>
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

    <section class="watch-layout">


        <div class="watch-panel">
            <div class="image-panel">
                <img src="<?php echo htmlspecialchars($watch['image']); ?>"
                    alt="<?php echo htmlspecialchars($name['name'])?>">
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

            <form action="" method="POST" class="cart-form">
                <input type="hidden" name="watch_id" value="<?php echo $watch['id']; ?>">

                <select name="quantity" class="quantity-select">
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                </select>

                <button type="submit" class="add-cart-btn">Add to Cart</button>
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
            toast.classList.remove("show");
        }, 2000);
    });
    </script>

</body>

</html>