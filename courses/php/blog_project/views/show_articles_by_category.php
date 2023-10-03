<?php include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php'; ?>

<?php require_once INCLUDES_PATH.'/header.php'; ?>
    
<?php require_once INCLUDES_PATH.'/aside_bar.php'; ?>

<!-- main -->
<div id="main">

    <?php 
        $category = get_category($db, $_GET['id']);
        if ( isset($category['id']) ):
    ?>
        <h1>Artículos de <?=$category['name']?></h1>
        <?php 
            $articles = get_articles($db, 0, $category['id']);
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
            else: ?>
                <div class="alert">No hay artículos en esta categoría</div>
        <?php endif; ?>
    <? else: ?>
        <h1> Categoría inexistente!... </h1>
    <?php endif; ?>

</div>
<!-- /. main -->
            
<?php require_once INCLUDES_PATH.'/footer.php'; ?>
