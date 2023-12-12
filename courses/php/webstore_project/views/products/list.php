<h2><?=$category->name?></h2>

<?php if( $products->num_rows > 0 ):?>
    <?php while( $product = $products->fetch_object() ):?>
        <div class="product">
            <a href="index.php?controller=Product&action=show&id=<?=$product->id?>">
                <?php if($product->image != null): ?>
                    <img src="assets/img/products/<?=$product->image?>" alt="<?=$product->image?>" width="50" height="100">
                <?php else: ?>
                    <img src="assets/img/products/sample-product.png" alt="product" width="50" height="100">
                <?php endif; ?>
            </a>
            <h2><?=$product->name?></h2>
            <p>$<?=$product->price?></p>
            <a href="index.php?controller=Cart&action=add_to_cart&product_id=<?=$product->id?>" class="buy-button">Buy</a>
        </div>
    <?php endwhile;?>
<?php else: ?>
    <div class="alert alert-error">
        <strong>There aren't registered products in that category!...</strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif; ?>