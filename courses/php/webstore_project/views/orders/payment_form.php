<h2>Payment Form</h2>

<?php if ( isset($_SESSION['msg']) ):?>
    <div class="alert alert-<?=$_SESSION['status']?>">
        <strong><?=$_SESSION['msg']?></strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif;?>

<?php $cart_stats = Utils::get_cart_stats(); ?>

<form action="index.php?controller=Order&action=confirm" method="POST">
    <h4>Shipping Address</h4>

    <label for="country">Country:</label>
    <input type="text" name="country">

    <label for="state">State:</label>
    <input type="text" name="state">

    <label for="address">Address:</label>
    <input type="text" name="address">

    <br>
    <label for="products_amount">Products: <?=$cart_stats['units']?></label>
    <label for="subtotal">Subtotal: $<?=$cart_stats['total']?></label>
    <label for="total">Total: $<?=$cart_stats['total']?></label>

    <input type="submit" value="confirm">
</form>

<?php Utils::delete_alert_messages(); ?>

