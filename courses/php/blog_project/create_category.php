<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside_bar.php'; ?>


<!-- main -->
<div id="main">
    <h1>Crear Categoría</h1>

    <br>
    <p>
        Formulario para añadir más categorias al blog
    </p>
    <br>

    <form action="actions/save_category.php" method="POST">
        <label for="name">Nombre de la cateogría:</label>
        <input type="text" name="name" id="name">

        <input type="submit" value="Guardar">
    </form>

</div>
<!-- /. main -->

<?php require_once 'includes/footer.php'; ?>