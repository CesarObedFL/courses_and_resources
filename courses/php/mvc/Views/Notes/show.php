
<h1>Note List</h1>

<br><hr><br>

<?php while( $note = $notes->fetch_object() ): ?>
    <?=$note->title . ' : ' . $note->date?> <br>
<?php endwhile; ?>