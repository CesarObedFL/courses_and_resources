
<?php if( isset($product) ): ?>
    <h2><?=$product->name?></h2>
    <div class="detail-product">
        <div class="detail-product-img">
            <?php if($product->image != null): ?>
                <img src="assets/img/products/<?=$product->image?>" alt="<?=$product->image?>" width="50" height="100">
            <?php else: ?>
                <img src="assets/img/products/sample-product.png" alt="product" width="50" height="100">
            <?php endif; ?>
        </div>
        <div class="detail-product-data">
            <h2><?=$product->name?></h2>
            <p>$<?=$product->price?></p>
            <a href="index.php?controller=Cart&action=add_to_cart&product_id=<?=$product->id?>" class="buy-button">Add to Cart</a>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-error">
        <strong>Inexistent Product!...</strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif; ?>