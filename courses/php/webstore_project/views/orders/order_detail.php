<h2>Order <?=$order->id?></h2>

<?php if ( isset($_SESSION['msg']) ):?>
    <div class="alert alert-<?=$_SESSION['status']?>">
        <strong><?=$_SESSION['msg']?></strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif;?>


<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Name</th>
            <th>Price</th>
            <th>Units</th>
        </tr>
    </thead>
    <tbody>
        <?php while( $product = $products->fetch_object() ):?>
            <tr>
                <td>
                    <a href="index.php?controller=Product&action=show&id=<?=$product->id?>">
                        <?php if($product->image != null): ?>
                            <img src="assets/img/products/<?=$product->image?>" alt="<?=$product->image?>" width="50" height="100">
                        <?php else: ?>
                            <img src="assets/img/products/sample-product.png" alt="product" width="50" height="100">
                        <?php endif; ?>
                    </a>
                </td>
                <td><?=$product->name?></td>
                <td><?='$'.$product->price?></td>
                <td><?=$product->units?></td>
            </tr>
        <?php endwhile;?>
    </tbody>
</table>



<?php Utils::delete_alert_messages(); ?>