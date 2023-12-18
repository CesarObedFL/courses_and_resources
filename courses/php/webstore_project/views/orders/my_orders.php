<h2>My Orders</h2>

<?php if ( isset($_SESSION['msg']) ):?>
    <div class="alert alert-<?=$_SESSION['status']?>">
        <strong><?=$_SESSION['msg']?></strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif;?>


<table>
    <thead>
        <tr>
            <th>Order</th>
            <th>Date</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php while( $order = $orders->fetch_object() ):?>
            <tr>
                <td>
                    <a href="index.php?controller=Order&action=order_detail&order_id=<?=$order->id?>"><?=$order->id?></a>
                </td>
                <td><?=$order->datetime?></td>
                <td><?='$'.$order->total?></td>
                <td></td>
            </tr>
        <?php endwhile;?>
    </tbody>
</table>



<?php Utils::delete_alert_messages(); ?>