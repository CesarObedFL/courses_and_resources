<h1>Categories Management</h1>

<a class="button button-sm" href="<?=BASE_URL?>">Create Categorie</a>


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