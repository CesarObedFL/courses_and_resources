<?php include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php'; ?>

<?php require_once INCLUDES_PATH.'/header.php'; ?>
    
<?php require_once INCLUDES_PATH.'/aside_bar.php'; ?>

<!-- main -->
<div id="main">

    <?php 
        $article = get_article_by_id($db, $_GET['id']);
        if ( isset($article['id']) ):
    ?>
        <h1>Artículo <?=$article['title']?></h1>
        <article class="article">
            <span class="b-date"><a href="<?=VIEWS_PATH.'/show_articles_by_category.php?id='.$article['category_id']?>"><?=$article['category']?></a><?=' | '.$article['date'].' | '.$article['user_name']?></span>
            <br><br>
            <p>
                <?=$article['description']?>
            </p>
        </article>

        <?php if ( isset($_SESSION['user']) && $_SESSION['user']['id'] == $article['user_id'] ): ?>
            <br>
            <hr>
            <a href="<?=VIEWS_PATH.'/edit_article.php?id='.$article['id']?>" class="button button-accept">editar</a>
            <a href="<?=ACTIONS_PATH.'/delete_article.php?id='.$article['id']?>" class="button button-close">borrar</a>
            <br>
            <hr>
        <?php endif; ?>
    <?php else: ?>
        <h1> Artículo inexistente!... </h1>
    <?php endif; ?>

</div>
<!-- /. main -->

<?php require_once INCLUDES_PATH.'/footer.php'; ?>