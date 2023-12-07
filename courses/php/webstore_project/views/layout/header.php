<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>clothes store</title>

        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body>
        <div id="container">
            <!-- header -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/logo.png" alt="logo">
                    <a href="index.php">
                        clothes store
                    </a>
                </div>
            </header>
            <!-- /. header -->

            <!-- menu -->
            <nav id="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php $categories = Utils::get_categories(); ?>
                    <?php if( isset($categories) ):?>
                        <?php while( $category = $categories->fetch_object() ):?>
                            <li><a href="index.php?controller=Product&action=list&category_id=<?=$category->id?>"><?=$category->name;?></a></li>
                        <?php endwhile;?>
                    <?php endif; ?>
                </ul>
            </nav>
            <!-- /. menu -->

            <div id="content">