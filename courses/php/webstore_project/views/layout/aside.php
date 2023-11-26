    <!-- sidebar -->
    <aside id="aside">
        <div id="login" class="block-aside">
            <?php if ( !isset($_SESSION['user']) ):?>
                <form action="<?=BASE_URL?>users/login" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <input type="submit" value="entrar">
                </form>
            <?php else: ?>
                <h2><?=$_SESSION['user']->name;?></h2>
                <ul>
                    <? if ( isset($_SESSION['admin']) ):?>
                        <li><a href="<?=BASE_URL?>">Manage Categories</a></li>
                        <li><a href="#">Manage Products</a></li>
                        <li><a href="#">Manage Orders</a></li>
                    <? endif; ?>
                    <li><a href="#">My Orders</a></li>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="<?=BASE_URL?>">Logout</a></li>
                </ul>
            <?php endif;?>
        </div>
    </aside>
    <!-- /. sidebar -->

    <!-- main -->
    <div id="main">