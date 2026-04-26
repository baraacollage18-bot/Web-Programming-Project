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
            <a href="index.php">Home</a>
            <a href="SignIn.php">Sign in</a>
            <a href="SignUp.php">Sign up</a>
            <a href="AboutUs.php">About us</a>
        </div>

        <div class="nav-right">
            <div class="logo"><img src="assets_img/Velmora-logo.svg"></div>
        </div>
    </nav>

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
</body>

</html>