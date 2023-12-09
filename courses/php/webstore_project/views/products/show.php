
<?php if( isset($product) ): ?>
    <h2><?=$product->name?></h2>
    <div class="product">
        <?php if($product->image != null): ?>
            <img src="assets/img/products/<?=$product->image?>" alt="<?=$product->image?>" width="50" height="100">
        <?php else: ?>
            <img src="assets/img/products/sample-product.png" alt="product" width="50" height="100">
        <?php endif; ?>
        <h2><?=$product->name?></h2>
        <p>$<?=$product->price?></p>
        <a href="#" class="buy-button">Buy</a>
        <a href="#" class="buy-button">Add to Cart</a>
    </div>
<?php else: ?>
    <div class="alert alert-error">
        <strong>Inexistent Product!...</strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif; ?>