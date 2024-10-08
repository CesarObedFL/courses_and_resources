<?php require_once 'database_connection.php'; ?>
<?php require_once 'helpers.php'; ?>

<DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Blog de VideoJuegos</title>
        <link rel="stylesheet" type="text/css" href="<?=ASSETS_PATH.'/css/style.css'?>">
    </head>

    <body>
        <!-- header -->
        <header id="header">
            <div id="logo">
                <a href="index.php">
                    Blog de VideoJuegos
                </a>
            </div>

            <!-- menu -->
            
            <nav id="nav-menu">
                <ul>
                    <li><a href="<?=DIR_PATH.'/index.php'?>">Inicio</a></li>
                    <?php 
                        $categories = get_categories($db);
                        if ( !empty( $categories) ):
                            while($categorie = mysqli_fetch_assoc($categories) ) : 
                    ?>
                        <li><a href="<?=VIEWS_PATH.'/show_articles_by_category.php?id='.$categorie['id']?>"><?=$categorie['name']?></a></li>
                    <?php 
                            endwhile; 
                        endif;
                    ?>
                    <li><a href="<?=DIR_PATH.'/index.php'?>">Sobre mí</a></li>
                    <li><a href="<?=DIR_PATH.'/index.php'?>">Contacto</a></li>
                </ul>
            </nav>
            <!-- /. menu -->
            <div class="clearfix"></div>
        </header>
        <!-- /. header -->

        <div id="container">