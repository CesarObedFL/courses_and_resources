<?php require_once 'includes/helpers.php'; ?>

<!-- sidebar -->
<aside id="sidebar">
    <div id="login" class="block-aside">
        <h3>Identificate</h3>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">
            <label for="password">Password</label>
            <input type="password" name="password">

            <input type="submit" name="submit" value="ENTRAR">
        </form>
    </div>

    <div id="register" class="block-aside">
        <h3>Regístrate</h3>
        <form action="register.php" method="POST">
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
    </div>

</aside>
<!-- /. sidebar -->