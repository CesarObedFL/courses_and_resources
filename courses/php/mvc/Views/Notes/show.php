
<h1>Note List</h1>

<br><hr><br>

<?php while( $note = $notes->fetch_object() ): ?>
    <?=$note->get_name() . ' : ' . $note->get_date()?> <br>
<?php endwhile; ?>