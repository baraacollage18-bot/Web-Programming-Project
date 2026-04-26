<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Homepage</title>
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
            <div class="logo">
                <img src="assets_img/Velmora-logo.svg">
            </div>
        </div>
    </nav>

    <h2 class="section-title">Brands</h2>

    <section class="brands">
        <?php while ($row = $result->fetch_assoc()): ?>

        <a class="brand-card" href="Watches.php?id=<?php echo $row['id']; ?>">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h3><?php echo $row['name']; ?></h3>
        </a>

        <?php endwhile; ?>
    </section>

    <h2 class="section-title">Featured</h2>
    <section class="brands"></section>

</body>

</html>