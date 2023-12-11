<h2></h2>

<table>
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Price</th>
            <th>Units</th>
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
                <td><?=$item['price']?></td>
                <td><?=$item['units']?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>