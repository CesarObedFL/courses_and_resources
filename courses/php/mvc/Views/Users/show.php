
<h1>User List</h1>

<br><hr><br>

<?php while( $user = $users->fetch_object() ): ?>
    <?=$user->name . ' : ' . $user->email?> <br>
<?php endwhile; ?>