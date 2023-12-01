<h1>Categories Management</h1>

<br>
<a class="button button-sm" href="<?=PUBLIC_URL?>index.php?controller=Category&action=create">Create Categorie</a>
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
    </tr>
<?php while( $categorie = $categories->fetch_object() ): ?>
    <tr>
        <td><?=$categorie->id;?></td>
        <td><?=$categorie->name;?></td>
    </tr>
<?php endwhile; ?>
</table>

<?php Utils::delete_alert_messages(); ?>