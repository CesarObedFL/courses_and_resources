<h1>Product Management</h1>

<br>
<a class="button button-sm" href="<?=PUBLIC_URL?>index.php?controller=Product&action=create">Create Product</a>
<br><br>

<?php if ( isset($_SESSION['msg']) ):?>
    <div class="alert alert-<?=$_SESSION['status']?>">
        <strong><?=$_SESSION['msg']?></strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif;?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>
<?php while( $product = $products->fetch_object() ): ?>
    <tr>
        <td><?=$product->id;?></td>
        <td><?=$product->name;?></td>
        <td><?='$'.$product->price;?></td>
        <td><?=$product->stock;?></td>
    </tr>
<?php endwhile; ?>
</table>

<?php Utils::delete_alert_messages(); ?>