<DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Blog de VideoJuegos</title>
    </head>

    <body>
        <!-- header -->
        <header>
            <div id="logo">
                <a href="index.php">
                    Blog de VideoJuegos
                </a>
            </div>

            <!-- menu -->
            <nav id="nav">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php">Categoria 1</a></li>
                    <li><a href="index.php">Categoria 2</a></li>
                    <li><a href="index.php">Categoria 3</a></li>
                    <li><a href="index.php">Categoria 4</a></li>
                    <li><a href="index.php">Sobre mí</a></li>
                    <li><a href="index.php">Contacto</a></li>
                </ul>
            </nav>
            <!-- /. menu -->
        </header>
        <!-- /. header -->

        <div id="container">
            <!-- sidebar -->
            <aside id="sidebar">
                <div id="login" class="block-aside">
                    <h3>Identificate</h3>
                    <form action="login.php" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Password</label>
                        <input type="password" name="password">

                        <input type="submit" value="enter">
                    </form>
                </div>

                <div id="register" class="block-aside">
                    <h3>Regístrate</h3>
                    <form action="register.php" method="POST">
                        <label for="name">Nombre</label>
                        <input type="email" name="email">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Password</label>
                        <input type="password" name="password">

                        <input type="submit" value="register">
                    </form>
                </div>

            </aside>
            <!-- /. sidebar -->

            <!-- main -->
            <div class="principal">
                <h2>Últimas entradas</h2>
                <article class="article">
                    <h2 class="article-title">Título de la entrada</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </article>

                <article class="article">
                    <h2 class="article-title">Título de la entrada</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </article>

                <article class="article">
                    <h2 class="article-title">Título de la entrada</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </article>
            </div>
            <!-- /. main -->
        </div>

        <!-- footer -->
        <footer id="footer">
            <p>Desarrollado por César Obed Figueroa Luna &copy; 2023</p>
        </footer>
        <!-- /. footer -->

    </body>
</html>