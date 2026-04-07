<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php';
?>
<?php include 'db.php'; ?>

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
        <a href="SignIn.html">Sign in</a>
        <a href="SignUp.html">Sign up</a>
        <a href="AboutUs.html">About us</a>
      </div>

      <div class="nav-right">
        <span class="logo">Velmora™</span>
      </div>
    </nav>

    <h2 class="section-title">Brands</h2>

    <?php
    $result = $conn->query("SELECT * FROM brands");
    ?>

    <section class="brands">
      <?php while ($row = $result->fetch_assoc()): ?>

      <a class="brand-card" href="Watches.php">
        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>"
        <h3><?php echo $row['name']; ?></h3>
      </a>

      <?php endwhile;?>
    </section>

    <h2 class="section-title">Featured</h2>
    <section class="brands">

    </section>
  </body>
</html>