<?php require_once 'includes/header.php'; ?>
    
<?php require_once 'includes/aside_bar.php'; ?>

<!-- main -->
<div id="main">
    <h1>Últimas entradas</h1>
    <?php
        $articles = get_articles($db, 4);
        if ( !empty($articles) ):
            while ( $article = mysqli_fetch_assoc($articles) ):
                ?>
                <article class="article">
                    <a href=""><h2 class="article-title"><?=$article['title']?></h2></a>
                    <span class="b-date"><?=$article['category'].' | '.$article['date']?></span>
                    <p>
                        <?=substr($article['description'],0, 160) . '...'?>
                    </p>
                </article>
            <?php endwhile;
        endif;
    ?>

    <div id="view-all-button">
        <a href="show_articles.php">Ver todas las entradas</a>
    </div>
</div>
<!-- /. main -->


<?php require_once 'includes/footer.php'; ?>

