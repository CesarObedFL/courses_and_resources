<h1>Categories Management</h1>

<br>
<a class="button button-sm" href="<?=PUBLIC_URL?>index.php?controller=Category&action=create">Create Categorie</a>
<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
<?php while( $categorie = $categories->fetch_object() ): ?>
    <tr>
        <td><?=$categorie->id;?></td>
        <td><?=$categorie->name;?></td>
    </tr>
<?php endWhile; ?>
</table>