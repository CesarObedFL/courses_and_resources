<h2>Some Products</h2>

<?php $products = Product::get_all() ?>
<?php if( isset($products) ):?>
    <?php while( $product = $products->fetch_object() ):?>
        <div class="product">

            <?php if($product->image != null): ?>
                <img src="assets/img/products/<?=$product->image?>" alt="<?=$product->image?>" width="50" height="100">
            <?php else: ?>
                <img src="assets/img/products/sample-product.png" alt="product" width="50" height="100">
            <?php endif; ?>

            <h2><?=$product->name?></h2>
            <p>$<?=$product->price?></p>
            <a href="#" class="buy-button">Buy</a>
        </div>
    <?php endwhile;?>
<?php endif; ?>

