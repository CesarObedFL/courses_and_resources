<h1>Product Management</h1>

<br>
<a class="button button-sm" href="<?=PUBLIC_URL?>index.php?controller=Product&action=create">Create Product</a>
<br><br>

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