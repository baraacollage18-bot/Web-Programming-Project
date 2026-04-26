<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    die("No watch selected");
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("
    SELECT watches.*, brands.name AS brand_name
    FROM watches
    JOIN brands ON watches.brand_id = brands.id
    WHERE watches.id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$watch = $result->fetch_assoc();

if (!$watch) {
    die("Watch not found");
}
?>

<!doctype html>
<html>

<head>
    <title><?php echo htmlspecialchars($watch['name']); ?></title>
</head>

<body>

    <h1><?php echo htmlspecialchars($watch['name']); ?></h1>

    <p>Brand: <?php echo htmlspecialchars($watch['brand_name']); ?></p>

    <img src="<?php echo htmlspecialchars($watch['image']); ?>" width="300">

    <p>Price: <?php echo htmlspecialchars($watch['price']); ?> EGP</p>

    <p>Description: <?php echo htmlspecialchars($watch['description']); ?></p>

    <p>Stock: <?php echo htmlspecialchars($watch['stock']); ?></p>

    <form action="add_to_cart.php" method="POST">
        <input type="hidden" name="watch_id" value="<?php echo $watch['id']; ?>">
        <button type="submit">Add to Cart</button>
    </form>

</body>

</html>