<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>

    <nav class="navbar">
        <div class="nav-left"></div>

        <div class="nav-right">
            <div class="logo">
                <img src="assets_img/Velmora-logo.svg">
            </div>
        </div>
    </nav>

    <h2 class="section-title">Admin Panel</h2>

    <div class="admin-stock-panel">

        <div class="admin-panel-header">
            <h3>Watch Stock Management</h3>
        </div>

        <?php if (!empty($message)): ?>
        <p class="admin-message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <div class="stock-table-header">
            <span>ID</span>
            <span>Brand</span>
            <span>Watch</span>
            <span>Stock</span>
            <span>Action</span>
        </div>

        <div class="stock-scroll-box">

            <?php while ($watch = $watches->fetch_assoc()): ?>

            <form class="stock-row" method="POST" action="admin.php">

                <span><?php echo htmlspecialchars($watch['id']); ?></span>

                <span><?php echo htmlspecialchars($watch['brand_name']); ?></span>

                <span><?php echo htmlspecialchars($watch['name']); ?></span>

                <input type="hidden" name="watch_id" value="<?php echo htmlspecialchars($watch['id']); ?>">

                <input type="number" name="stock" min="0" value="<?php echo htmlspecialchars($watch['stock']); ?>"
                    required>

                <button type="submit">Update</button>

            </form>

            <?php endwhile; ?>

        </div>

    </div>

    <script>
    const msg = document.querySelector(".admin-message");

    if (msg) {
        setTimeout(() => {
            msg.classList.add("show");
        }, 50);

        setTimeout(() => {
            msg.classList.remove("show");
            msg.classList.add("hide");
        }, 3000);
    }
    </script>

</body>

</html>