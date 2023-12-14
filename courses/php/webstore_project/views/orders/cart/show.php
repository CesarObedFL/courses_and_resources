<h2>Your Cart</h2>

<?php if ( !isset($cart) ):?>
    <div class="alert alert-error">
        <strong>Your cart is empty!...</strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>

<?php else: ?>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Name</th>
                <th>Units</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $cart as $index => $item ): ?>
                <tr>
                    <td>
                        <?php if($item['image'] != null): ?>
                            <img src="assets/img/products/<?=$item['image']?>" alt="<?=$item['image']?>" width="60" height="80">
                        <?php else: ?>
                            <img src="assets/img/products/sample-product.png" alt="product" width="60" height="80">
                        <?php endif; ?>
                    </td>
                    <td><?=$item['name']?></td>
                    <td><?=$item['units']?></td>
                    <td><?='$'.number_format($item['price'], 2)?></td>
                    <td>
                        <a href="index.php?controller=Cart&action=add_to_cart&product_id=<?=$item['product_id']?>" class="action-button add-product-button">+</a>
                        <a href="index.php?controller=Cart&action=substract_to_cart&product_id=<?=$item['product_id']?>" class="action-button substract-product-button">-</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <?php $cart_stats = Utils::get_cart_stats(); ?>
            <tr>
                <td>
                    <a href="index.php?controller=Cart&action=delete" class="action-button remove-cart-button">remove all</a>
                </td>
                <td></td>
                <td></td>
                <td>Total: $<?=number_format($cart_stats['total'], 2)?></td>
                <td>
                    <a href="index.php?controller=Order&action=payment_form" class="action-button pay-order-button">pay order</a> 
                </td>
            </tr>
        </tfoot>
    </table>

<?php endif;?>