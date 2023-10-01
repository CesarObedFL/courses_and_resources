<?php require_once '../includes/redirect.php'; ?>
<?php require_once '../includes/header.php'; ?>
<?php require_once '../includes/aside_bar.php'; ?>


<!-- main -->
<div id="main">
    <h1>Crear Artículo</h1>

    <br>
    <p>
        Formulario para añadir un artículo al blog
    </p>
    <br>

    <form action="../actions/save_article.php" method="POST">
        <label for="title">Título del artículo:</label>
        <input type="text" name="title" id="title">
        <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'title') : ''; ?>

        <label for="description">Descripción:</label>
        <textarea name="description" id="description" cols="125" rows="30"></textarea>
        <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'description') : ''; ?>

        <label for="category">Categoría:</label>
        <select name="category_id" id="category_id">
            <option>Selecciona una categoría</option>
            <?php 
                $categories = get_categories($db);
                if ( !empty( $categories) ):
                    while($categorie = mysqli_fetch_assoc($categories) ) : 
            ?>
                <option value="<?=$categorie['id']?>"><?=$categorie['name']?></option>
            <?php 
                    endwhile; 
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'category') : ''; ?>


        <input type="submit" value="Guardar">
    </form>

    <?php clean_errors(); ?>

</div>
<!-- /. main -->

<?php require_once '../includes/footer.php'; ?>