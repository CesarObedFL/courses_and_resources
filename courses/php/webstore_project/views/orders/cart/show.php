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
                <th></th>
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
                            <img src="assets/img/products/<?=$item['image']?>" alt="<?=$item['image']?>" width="50" height="100">
                        <?php else: ?>
                            <img src="assets/img/products/sample-product.png" alt="product" width="50" height="100">
                        <?php endif; ?>
                    </td>
                    <td><?=$item['name']?></td>
                    <td><?=$item['units']?></td>
                    <td><?='$'.$item['price']?></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td>Total: $<?=$cart_stats['total']?></td>
                <td>
                    <a href="index.php?controller=Cart&action=delete" class="action-button remove-cart-button">remove all</a>
                </td>
            </tr>
        </tfoot>
    </table>

<?php endif;?>