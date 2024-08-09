<h2>Create Category</h2>

<?php if ( isset($_SESSION['msg']) ):?>
    <div class="alert alert-<?=$_SESSION['status']?>">
        <strong><?=$_SESSION['msg']?></strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif;?>

<form action="index.php?controller=Category&action=save" method="POST">
    <label for="name">Category:</label>
    <input type="text" name="name" required>

    <input type="submit" value="SAVE">
</form>

<?php Utils::delete_alert_messages(); ?>