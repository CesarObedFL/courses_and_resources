<h1>Create User</h1>

<hr>

<?php if ( isset($_SESSION['user_register']) ): ?>
    <strong><?=$_SESSION['user_register'];?></strong>
<?php endif; ?>

<?php Utils::delete_session('user_register');?>

<form action="index.php?controller=User&action=save" method="POST">
    <label for="name">Name</label>
    <input type="text" name="name" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <input type="submit" value="create">
</form>