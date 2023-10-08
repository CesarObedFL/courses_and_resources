<?php include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php'; ?>
<?php require_once INCLUDES_PATH.'/redirect.php'; ?>
<?php require_once INCLUDES_PATH.'/header.php'; ?>
<?php require_once INCLUDES_PATH.'/aside_bar.php'; ?>


<!-- main -->
<div id="main">
    <h1>Editar Artículo</h1>

    <br>
    <p>
        Formulario para editar el artículo al blog
    </p>
    <br>

    <?php 
        $article = get_article_by_id($db, $_GET['id']);
        if ( isset($article['id']) ):
    ?>

        <form action="<?=ACTIONS_PATH.'/save_article.php?edit='.$article['id']?>" method="POST">
            <label for="title">Título del artículo:</label>
            <input type="text" name="title" id="title" value="<?=$article['title']?>">
            <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'title') : ''; ?>

            <label for="description">Descripción:</label>
            <textarea name="description" id="description" cols="125" rows="30" value="<?=$article['description']?>"></textarea>
            <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'description') : ''; ?>

            <label for="category">Categoría:</label>
            <select name="category_id" id="category_id">
                <option>Selecciona una categoría</option>
                <?php 
                    $categories = get_categories($db);
                    if ( !empty( $categories) ):
                        while($categorie = mysqli_fetch_assoc($categories) ) : 
                ?>
                    <option value="<?=$categorie['id']?>" 
                        <?=($categorie['id']==$article['category_id']) ? "selected='selected '": '';?>><?=$categorie['name']?></option>
                <?php 
                        endwhile; 
                    endif;
                ?>
            </select>
            <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'category') : ''; ?>


            <a href="<?=VIEWS_PATH.'/show_article_by_id.php?id='.$_GET['id']?>" class="button button-profile">Cancelar</a>
            <input type="submit" value="Editar">
        </form>

    <?php else: ?>
        <h1> Artículo inexistente!... </h1>

        <a href="<?=VIEWS_PATH.'/show_article_by_id.php?id='.$_GET['id']?>" class="button button-profile">Regresar</a>
    <?php endif; ?>

    <?php clean_errors(); ?>

</div>
<!-- /. main -->

<?php require_once INCLUDES_PATH.'/footer.php'; ?>