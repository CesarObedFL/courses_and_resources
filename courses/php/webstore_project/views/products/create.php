<h2>Create Product</h2>

<div class="form-container">
    <form action="index.php?controller=Product&action=save" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name">

        <label for="description">Description:</label>
        <textarea name="description" rows="3"></textarea>

        <label for="price">Price:</label>
        <input type="text" name="price">

        <label for="stock">Stock:</label>
        <input type="text" name="stock">

        <label for="category">Category:</label>
        <?php $categories = Utils::get_categories(); ?>
        <select name="category">
            <?php while( $category = $categories->fetch_object() ):?>
                <option value="<?=$category->id?>"><?=$category->name?></option>
            <?php endwhile; ?>
        </select>

        <label for="offer">Offer:</label>
        <input type="text" name="offer">

        <label for="image">Image:</label>
        <input type="file" name="image">

        <br>
        <br>
        <input type="submit" value="create">
    </form>
</div>