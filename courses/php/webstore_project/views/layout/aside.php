    <!-- sidebar -->
    <aside id="aside">
        <div id="login" class="block-aside">
            <?php if ( !isset($_SESSION['user']) ):?>

                <?php if ( isset($_SESSION['msg']) ):?>
                    <div class="alert alert-<?=$_SESSION['status']?>">
                        <strong><?=$_SESSION['msg']?></strong>
                        <span class="close-alert-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                <?php endif;?>

                <form action="<?=PUBLIC_URL?>index.php?controller=User&action=login" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <input type="submit" value="entrar">
                </form>
                <br>
                <li><a href="<?=PUBLIC_URL?>index.php?controller=User&action=register">Register</a></li>
                <?php Utils::delete_alert_messages(); ?>
            <?php else: ?>
                <h2><?=$_SESSION['user']->name;?></h2>
                <ul>
                    <? if ( isset($_SESSION['admin']) ):?>
                        <li><a href="<?=PUBLIC_URL?>index.php?controller=Category&action=index">Manage Categories</a></li>
                        <li><a href="<?=PUBLIC_URL?>index.php?controller=Product&action=management">Manage Products</a></li>
                        <li><a href="#">Manage Orders</a></li>
                    <? endif; ?>
                    <li><a href="#">My Orders</a></li>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="<?=PUBLIC_URL?>index.php?controller=Cart&action=show">My Cart</a></li>
                    <li><a href="<?=PUBLIC_URL?>index.php?controller=User&action=logout">Logout</a></li>
                </ul>
            <?php endif;?>
        </div>
    </aside>
    <!-- /. sidebar -->

    <!-- main -->
    <div id="main">