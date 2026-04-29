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

    <section class="watch-carousel-wrapper">
        <button class="carousel-btn prev" id="featuredPrevBtn">&#10094;</button>

        <div class="watch-carousel" id="featuredCarousel">
            <?php while ($watch = $featured->fetch_assoc()): ?>
            <a class="watch-link" href="WatchPage.php?id=<?php echo $watch['id']; ?>">
                <div class="watch-box">
                    <img src="<?php echo htmlspecialchars($watch['image']); ?>"
                        alt="<?php echo htmlspecialchars($watch['name']); ?>">

                    <div class="watch-overlay">
                        <h3><?php echo htmlspecialchars($watch['name']); ?></h3>
                        <p>Price: <?php echo htmlspecialchars($watch['price']); ?> EGP</p>
                    </div>
                </div>
            </a>
            <?php endwhile; ?>
        </div>

        <button class="carousel-btn next" id="featuredNextBtn">&#10095;</button>
    </section>

    <script>
    const featuredCarousel = document.getElementById("featuredCarousel");
    const featuredPrevBtn = document.getElementById("featuredPrevBtn");
    const featuredNextBtn = document.getElementById("featuredNextBtn");

    featuredNextBtn.addEventListener("click", () => {
        const card = featuredCarousel.querySelector(".watch-box");
        if (!card) return;

        const moveAmount = card.offsetWidth + 20;
        featuredCarousel.scrollBy({
            left: moveAmount,
            behavior: "smooth"
        });
    });

    featuredPrevBtn.addEventListener("click", () => {
        const card = featuredCarousel.querySelector(".watch-box");
        if (!card) return;

        const moveAmount = card.offsetWidth + 20;
        featuredCarousel.scrollBy({
            left: -moveAmount,
            behavior: "smooth"
        });
    });
    </script>



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