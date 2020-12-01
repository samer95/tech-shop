<?php
// prepare categories
$stm = $pdo->prepare("SELECT * FROM categories LIMIT 10");
$stm->execute();
$someCategories = $stm->fetchAll(PDO::FETCH_ASSOC);

// randomly products
$stm = $pdo->prepare("SELECT * FROM products ORDER BY RAND ( ) LIMIT 10");
$stm->execute();
$randomProducts = $stm->fetchAll(PDO::FETCH_ASSOC);

// best sell
$stm = $pdo->prepare("SELECT * FROM products WHERE points > 5 ORDER BY points LIMIT 10");
$stm->execute();
$bestProducts = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="span3 col">
    <div class="block">
        <ul class="nav nav-list">
            <li class="nav-header">KATEGORİLER</li>
            <? foreach ($someCategories as $category) {
                echo "<li><a href='products.php'>{$category['name']}</a></li>";
            } ?>
        </ul>
        <br/>
    </div>
    <div class="block">
        <h4 class="title">
            <span class="pull-left"><span class="text">Rastgele</span></span>
            <span class="pull-right">
                <a class="left button" href="#myCarousel" data-slide="prev"></a>
                <a class="right button" href="#myCarousel" data-slide="next"></a>
            </span>
        </h4>
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                <? foreach ($randomProducts as $key => $product) { ?>
                    <div class=" <?= $key === 0 ? 'active' : '' ?> item">
                        <ul class="thumbnails">
                            <li class="span3">
                                <div class="product-box">
                                    <span class="sale_tag"></span>
                                    <p>
                                        <a href="product_details.php?id=<?= $product['id'] ?>">
                                            <img src="Assets/Images/<?= $product['image_name'] ?>" alt=""/>
                                        </a>
                                    </p>
                                    <a href="product_details.php?id=<?= $product['id'] ?>" class="title"> <?= $product['name'] ?></a><br/>
                                    <a href="products.php" class="category"> <?= $product['brand'] ?></a>
                                    <p class="price">$ <?= $product['price'] ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    <div class="block">
        <h4 class="title"><strong>En İyi</strong> Satılan</h4>
        <ul class="small-product">
            <? foreach ($bestProducts as $key => $product) { ?>
                <li>
                    <a href="#" title="Praesent tempor sem sodales">
                        <img src="Assets/Images/<?= $product['image_name'] ?>" alt="<?= $product['name'] ?>">
                    </a>
                    <a href="#"><?= $product['name'] ?></a>
                </li>
            <? } ?>
        </ul>
    </div>
</div>