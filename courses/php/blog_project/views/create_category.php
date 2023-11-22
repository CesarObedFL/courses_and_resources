<?php include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php'; ?>
<?php require_once INCLUDES_PATH.'/redirect.php'; ?>
<?php require_once INCLUDES_PATH.'/header.php'; ?>
<?php require_once INCLUDES_PATH.'/aside_bar.php'; ?>


<!-- main -->
<div id="main">
    <h1>Crear Categoría</h1>

    <br>
    <p>
        Formulario para añadir más categorias al blog
    </p>
    <br>

    <form action="<?=ACTIONS_PATH.'/save_category.php'?>" method="POST">
        <label for="name">Nombre de la cateogría:</label>
        <input type="text" name="name" id="name">

        <input type="submit" value="Guardar">
    </form>

</div>
<!-- /. main -->

<?php require_once INCLUDES_PATH.'/footer.php'; ?>