<?php require_once INCLUDES_PATH.'/helpers.php'; ?>

<!-- sidebar -->
<aside id="sidebar">

    <?php if(isset($_SESSION['user'])): ?>
        <div class="block-aside">
            <h3>Bienvenido, <?=$_SESSION['user']['name'];?></h3>

            <!-- action buttons -->
            <a href="<?=VIEWS_PATH.'/create_article.php'?>" class="button button-accept">crear artículo</a>
            <a href="<?=VIEWS_PATH.'/create_category.php'?>" class="button">crear categoría</a>
            <a href="<?=VIEWS_PATH.'/profile.php'?>" class="button button-profile">mi perfil</a>
            <a href="<?=ACTIONS_PATH.'/logout.php'?>" class="button button-close">logout</a>
            <!-- /. action buttons -->

        </div>
    <?php endif; ?>

    <?php if( !isset($_SESSION['user'])): ?>
        <div id="login" class="block-aside">
            <h3>Login</h3>

            <? if( isset($_SESSION['errors']['login']) ): ?>
                <div class="alert alert-error">
                    <?=$_SESSION['errors']['login']?>
                </div>
            <? endif; ?>

            <form action="<?=ACTIONS_PATH.'/login.php'?>" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Password</label>
                <input type="password" name="password">

                <input type="submit" name="submit" value="ENTRAR">
            </form>
        </div> <!-- /. id="login" -->

        <div id="register" class="block-aside">
            <h3>Regístrate</h3>

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

            <form action="<?=ACTIONS_PATH.'/register.php'?>" method="POST">
                <label for="name">Nombre</label>
                <input type="text" name="name">
                <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'name') : ''; ?>

                <label for="email">Email</label>
                <input type="email" name="email">
                <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'email') : ''; ?>


                <label for="password">Password</label>
                <input type="password" name="password">
                <?php echo isset($_SESSION['errors']) ? show_errors($_SESSION['errors'], 'password') : ''; ?>

                <input type="submit" value="REGISTRARSE">
            </form>

            <?php clean_errors(); ?>
        </div> <!-- /. id="register" -->

    <?php endif; ?>

</aside>
<!-- /. sidebar -->