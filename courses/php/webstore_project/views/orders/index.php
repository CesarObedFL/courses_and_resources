<h2>Order List</h2>

<?php if ( isset($_SESSION['msg']) ):?>
    <div class="alert alert-<?=$_SESSION['status']?>">
        <strong><?=$_SESSION['msg']?></strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif;?>

<?php if( isset($orders) ): ?>

    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Client</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $order = $orders->fetch_object() ):?>
                <tr>
                    <td>
                        <a href="index.php?controller=Order&action=order_detail&order_id=<?=$order->id?>"><?=$order->id?></a>
                    </td>
                    <td><?=$order->client?></td>
                    <td><?=$order->datetime?></td>
                    <td><?='$'.$order->total?></td>
                    <td><span class="badge badge-<?=$order->status?>"><?=$order->status?></span></td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>

<?php else: ?>
    <div class="alert alert-error">
        <strong>There aren't any orders yet!...</strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>

<?php endif;?>


<?php Utils::delete_alert_messages(); ?>