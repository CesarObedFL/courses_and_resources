<?php include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php'; ?>
<?php require_once INCLUDES_PATH.'/redirect.php'; ?>
<?php require_once INCLUDES_PATH.'/header.php'; ?>
<?php require_once INCLUDES_PATH.'/aside_bar.php'; ?>


<!-- main -->
<div id="main">
    <h1>Mi Perfil</h1>

    <br>

     <!-- show messages -->
    <?php if ( isset($_SESSION['saved']) ): ?>
        <div class="alert alert-success">
            <?= $_SESSION['saved'] ?>
        </div>
    <? elseif( isset($_SESSION['errors']['saved']) ): ?>
        <div class="alert alert-error">
            <?=$_SESSION['errors']['saved']?>
        </div>
    <? endif; ?>
    <!-- /. show messages -->

    <form action="<?=ACTIONS_PATH.'/update_profile.php'?>" method="POST">
        <label for="name">Nombre</label>
        <input type="text" name="name" value="<?=$_SESSION['user']['name'];?>">
        <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'name') : ''; ?>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?=$_SESSION['user']['email'];?>">
        <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'email') : ''; ?>

        <input type="submit" value="Actualizar">
    </form>

    <?php clean_errors(); ?>

</div>
<!-- /. main -->

<?php require_once INCLUDES_PATH.'/footer.php'; ?>