<?php include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php'; ?>

<?php require_once INCLUDES_PATH.'/header.php'; ?>
    
<?php require_once INCLUDES_PATH.'/aside_bar.php'; ?>

<!-- main -->
<div id="main">

    <?php 
        if ( isset($_POST['search']) && !empty($_POST['search']) ):
            $articles = get_articles($db, null, null, $_POST['search']);
            if ( isset($articles) && !empty($articles) ):
        ?>
            <h1>Artículos encontrados con : <?=$_POST['search']?></h1>
            <?php 
                while ( $article = mysqli_fetch_assoc($articles) ): ?>
                    <article class="article">
                        <a href="<?=VIEWS_PATH.'/show_article_by_id.php?id='.$article['id']?>"><h2 class="article-title"><?=$article['title']?></h2></a>
                        <span class="b-date"><?=$article['category'].' | '.$article['date']?></span>
                        <p>
                            <?=substr($article['description'],0, 160) . '...'?>
                        </p>
                    </article>
                <?php endwhile; ?>
        <?php else: ?>
            <h1> No se encontró ningún artículo con <?=$_POST['search']?>!... </h1>
        <?php endif; ?>
    <?php else: ?>
        <h1> Error al buscar!... </h1>
    <?php endif;?>

</div>
<!-- /. main -->
            
<?php require_once INCLUDES_PATH.'/footer.php'; ?>

