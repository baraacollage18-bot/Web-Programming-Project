<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <link rel="stylesheet" href="Styles.css">
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

    <h2 class="section-title">My Account</h2>

    <div class="account-box">

        <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <?php if (!$editMode): ?>

        <p><b>ID:</b> <?php echo htmlspecialchars($user['id']); ?></p>
        <p><b>Name:</b> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><b>Email:</b> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><b>Gender:</b> <?php echo htmlspecialchars($user['gender']); ?></p>
        <p><b>Country:</b> <?php echo htmlspecialchars($user['country']); ?></p>

        <a href="Account.php?edit=1">
            <button>Edit Account</button>
        </a>

        <?php else: ?>

        <form method="POST" action="Account.php">

            <p><b>ID:</b> <?php echo htmlspecialchars($user['id']); ?></p>

            <label>Name:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>

            <label>Country:</label>
            <select name="country" required>
                <option value="SA" <?php if ($user['country'] == 'SA') echo 'selected'; ?>>Saudi Arabia</option>
                <option value="EG" <?php if ($user['country'] == 'EG') echo 'selected'; ?>>Egypt</option>
                <option value="SY" <?php if ($user['country'] == 'SY') echo 'selected'; ?>>Syria</option>
            </select>

            <hr>

            <h3>Change Password</h3>

            <label>Old Password:</label>
            <input type="password" name="old_password">

            <label>New Password:</label>
            <input type="password" name="new_password">

            <button type="submit">Save Changes</button>

            <a href="Account.php">
                <button type="button">Cancel</button>
            </a>

        </form>

        <?php endif; ?>

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