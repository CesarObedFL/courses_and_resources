<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>clothes store</title>

        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body>

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
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Categoria 1</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 3</a></li>
                <li><a href="#">Categoria 4</a></li>
                <li><a href="#">Categoria 5</a></li>
            </ul>
        </nav>
        <!-- /. menu -->

        <div id="content">
            <!-- sidebar -->
            <aside id="aside">
                <div id="login" class="block-aside">
                    <form action="#" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                        <input type="submit" value="entrar">
                    </form>

                    <a href="#">My Orders</a>
                    <a href="#">My Profile</a>
                </div>
            </aside>
            <!-- /. sidebar -->

            <!-- main -->
            <div id="main">
                <div class="product">
                    <img src="assets/img/blue-shirt.png" alt="blue shirt">
                    <h2>Blue Shirt</h2>
                    <p>$20</p>
                    <a href="#">Buy</a>
                </div>

                <div class="product">
                    <img src="assets/img/red-shirt.png" alt="blue shirt">
                    <h2>Red Shirt</h2>
                    <p>$20</p>
                    <a href="#">Buy</a>
                </div>

                <div class="product">
                    <img src="assets/img/green-shirt.png" alt="blue shirt">
                    <h2>Green Shirt</h2>
                    <p>$20</p>
                    <a href="#">Buy</a>
                </div>

            </div>
            <!-- /. main -->
        </div>

        <!-- footer -->
        <footer id="footer">
            <p>Developed by César Obed Figueroa Luna &copy; <?=date('2023')?></p>
        </footer>
        <!-- /. footer -->

        
    </body>

</html>