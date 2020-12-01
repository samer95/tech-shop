<?php
$stm = $pdo->prepare("SELECT * FROM categories");
$stm->execute();
$allSelectedCategories = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="navbar main-menu">
    <div class="navbar-inner main-menu">
        <a href="index.php" class="logo pull-left">
			<img src="Assets/Images/logo.png" class="site_logo" alt="" style="height:40px;">
		</a>
        <nav id="menu" class="pull-right">
            <ul>
                <li><a href="products.php">Kategotiler</a>
                    <ul>
                        <?foreach ($allSelectedCategories as $selectedCategory) {
                            echo "<li><a href='products.php'>{$selectedCategory['name']}</a></li>";
                        }?>
                    </ul>
                </li>
                <li><a href="products.php">Ürünler</a></li>
                <li><a href="products.php">En İyi Satılan</a></li>
                <li><a href="products.php">En Çok Satılan</a></li>
            </ul>
        </nav>
    </div>
</section>