<h2>Edit Product</h2>

<?php if ( isset($_SESSION['msg']) ):?>
    <div class="alert alert-<?=$_SESSION['status']?>">
        <strong><?=$_SESSION['msg']?></strong>
        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif;?>

<div class="form-container">
    <form action="index.php?controller=Product&action=update&id=<?=$product->id?>" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?=$product->name?>">

        <label for="description">Description:</label>
        <textarea name="description" rows="3"><?=$product->description?></textarea>

        <label for="price">Price:</label>
        <input type="text" name="price" value="<?=$product->price?>">

        <label for="stock">Stock:</label>
        <input type="text" name="stock" value="<?=$product->stock?>">

        <label for="category">Category:</label>
        <?php $categories = Utils::get_categories(); ?>
        <select name="category">
            <?php while( $category = $categories->fetch_object() ):?>
                <option value="<?=$category->id?>" <?php if($product->category_id == $category->id) echo 'selected'; ?>><?=$category->name?></option>
            <?php endwhile; ?>
        </select>

        <label for="offer">Offer:</label>
        <input type="text" name="offer" value="<?=$product->offer?>">

        <label for="image">Image:</label>
        <input type="file" name="image">

        <br>
        <br>
        <input type="submit" value="update">
    </form>

    <?php Utils::delete_alert_messages(); ?>
</div>