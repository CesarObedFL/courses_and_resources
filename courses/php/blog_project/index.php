<?php include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php'; ?>

<?php require_once INCLUDES_PATH.'/header.php'; ?>
    
<?php require_once INCLUDES_PATH.'/aside_bar.php'; ?>

<!-- main -->
<div id="main">
    <h1>Últimas entradas</h1>
    <?php
        $articles = get_articles($db, 4);
        if ( !empty($articles) ):
            while ( $article = mysqli_fetch_assoc($articles) ):
                ?>
                <article class="article">
                    <a href="<?=VIEWS_PATH.'/show_article_by_id.php?id='.$article['id']?>"><h2 class="article-title"><?=$article['title']?></h2></a>
                    <span class="b-date"><?=$article['category'].' | '.$article['date']?></span>
                    <p>
                        <?=substr($article['description'],0, 160) . '...'?>
                    </p>
                </article>
            <?php endwhile;
        endif;
    ?>

    <div id="view-all-button">
        <a href="<?=VIEWS_PATH.'/show_articles.php';?>">Ver todas las entradas</a>
    </div>
</div>
<!-- /. main -->


<?php require_once INCLUDES_PATH.'/footer.php'; ?>

