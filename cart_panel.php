<?php
$cartItems = [];

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("
        SELECT 
            cart_item.id AS item_id,
            watches.name,
            watches.price,
            watches.image,
            cart_item.quantity
        FROM cart
        JOIN cart_item ON cart.id = cart_item.cart_id
        JOIN watches ON cart_item.watch_id = watches.id
        WHERE cart.user_id = ?
    ");

    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $cartItems = $stmt->get_result();
}
?>

<div class="cart-panel" id="cartPanel">
    <button class="cart-close-btn" id="closeCart"></button>

    <h2>Your Cart</h2>

    <div class="cart-items">
        <?php if (isset($_SESSION['user_id'])): ?>
        <?php if ($cartItems && $cartItems->num_rows > 0): ?>
        <?php while ($item = $cartItems->fetch_assoc()): ?>
        <div class="cart-item">
            <form action="remove_from_cart.php" method="POST" class="remove-form">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                <button type="submit" class="remove-btn">✕</button>
            </form>

            <img src="<?php echo htmlspecialchars($item['image']); ?>"
                alt="<?php echo htmlspecialchars($item['name']); ?>">

            <div class="cart-item-info">
                <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                <p><?php echo htmlspecialchars($item['price']); ?> EGP</p>
                <p>Qty: <?php echo htmlspecialchars($item['quantity']); ?></p>
            </div>
        </div>

        <?php endwhile; ?>
        <?php else: ?>
        <p class="empty-cart">Your cart is empty.</p>
        <?php endif; ?>

        <?php else: ?>
        <p class="empty-cart">Please sign in to view your cart.</p>
        <?php endif; ?>
    </div>

    <div class="cart-actions">
        <button class="continue-btn" id="continueShopping">Continue Shopping</button>
        <button class="checkout-btn">Checkout</button>
    </div>
</div>

<div class="cart-overlay" id="cartOverlay"></div>