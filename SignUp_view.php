<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>SignUp Page</title>
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

    <h2 class="main-title">Sign up</h2>
    <div class="form-container">

        <?php if (!empty($msg)): ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
        <?php endif; ?>

        <form action="SignUp.php" method="POST">
            <!-- Name -->
            <label for="Name"><b>Username:</b></label><br />
            <input type="text" id="Name" name="username" class="input-field" /><br /><br />

            <!-- Email -->
            <label for="Email"><b>Email:</b></label><br />
            <input type="text" id="Email" name="email" class="input-field" /><br /><br />

            <!-- Password -->
            <label for="Password"><b>Password:</b></label><br />
            <input type="password" id="Password" name="password" class="input-field" /><br /><br />

            <!-- ReEnterPassword -->
            <label for="ReEnterPassword"><b>ReEnterPassword:</b></label><br />
            <input type="password" id="ReEnterPassword" name="rePassword" class="input-field" /><br /><br />

            <label for="PhoneNumber"><b>Phone Number:</b></label><br>
            <input type="text" id="PhoneNumber" name="phoneNumber" class="input-field"><br><br>

            <div class="radio-group">
                <!-- Gender -->
                <label for="Gender"><b>Gender:</b></label><br /><br />
                <input type="radio" id="Gender" name="gender" value="Male" />
                <label for="Male"><b>Male</b></label>

                <input type="radio" id="Gender" name="gender" value="Female" />
                <label for="Female"><b>Female</b></label><br /><br />
            </div>
            <!-- Country -->
            <label for="Country"><b>Country</b></label><br />
            <select for="Country" name="country">
                <option value="EG">Egypt</option>
                <option value="SA">Saudia Arabia</option>
                <option value="SY">Syria</option>
            </select><br /><br />
            <button type="submit" class="btn"><b>Sign up</b></button>
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