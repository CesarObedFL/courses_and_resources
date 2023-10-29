
<h1>User List</h1>

<br><hr><br>

<?php while( $user = $users->fetch_object() ): ?>
    <?=$user->get_name() . ' : ' . $user->get_email()?> <br>
<?php endwhile; ?>