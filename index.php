<?php
require 'src/Layout/Head.php';

$stm = $pdo->prepare("SELECT * FROM products WHERE points > 5");
$stm->execute();
$allProducts = $stm->fetchAll(PDO::FETCH_ASSOC);
$highPointsProducts = [];
$rowsCount = -1;
foreach ($allProducts as $key => $product) {
    if ($key % 4 === 0) {
        $rowsCount++;
    }
    $highPointsProducts[$rowsCount][$key % 4] = $product;
}

$stm = $pdo->prepare("SELECT * FROM products WHERE created_at between date_sub(now(),INTERVAL 1 WEEK) and now(); ");
$stm->execute();
$allProducts = $stm->fetchAll(PDO::FETCH_ASSOC);
$lastWeekProducts = [];
$rowsCount = -1;
foreach ($allProducts as $key => $product) {
    if ($key % 4 === 0) {
        $rowsCount++;
    }
    $lastWeekProducts[$rowsCount][$key % 4] = $product;
}
?>

    <section class="homepage-slider" id="home-slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="Assets/Images/HomePage/Carousel/Slade_1.jpg" alt=""/>
                    <div class="intro">
                        <h1>Sezon Ortası İndirimi</h1>
                        <p><span>%50'ye Kadar İndirim</span></p>
                        <p><span>Çevrimiçi ve mağazadaki seçili öğeler hakkında</span></p>
                    </div>
                </li>
                <li>
                    <img src="Assets/Images/HomePage/Carousel/Slade_2.jpg" alt=""/>
                </li>
            </ul>
        </div>
    </section>
    <section class="header_text"> En ucuz indirimler bizimle bulabilirsin</section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left">
                                <span class="text">
                                    <span class="line">ÖZELLİK <strong>ÜRÜNLERİ</strong></span>
                                </span>
                            </span>
                            <span class="pull-right">
                                <a class="left button" href="#myCarousel" data-slide="prev"></a>
                                <a class="right button" href="#myCarousel" data-slide="next"></a>
                            </span>
                        </h4>
                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <? foreach ($highPointsProducts as $key => $fourProducts) { ?>
                                    <div class=" <?= $key === 0 ? 'active' : '' ?> item">
                                        <ul class="thumbnails">
                                            <? foreach ($fourProducts as $product) { ?>
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p>
                                                            <a href="product_details.php?id=<?= $product['id'] ?>">
                                                                <img src="Assets/Images/<?= $product['image_name'] ?>" alt=""/>
                                                            </a>
                                                        </p>
                                                        <a href="product_details.php?id=<?= $product['id'] ?>"
                                                           class="title"> <?= $product['name'] ?></a><br/>
                                                        <a href="products.php" class="category"><?= $product['brand'] ?></a>
                                                        <p class="price">$<?= $product['price'] ?></p>
                                                    </div>
                                                </li>
                                            <? } ?>
                                        </ul>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">En Son <strong>Ürünler</strong></span></span></span>
                            <span class="pull-right">
                            <a class="left button" href="#myCarousel-2" data-slide="prev"></a>
                            <a class="right button" href="#myCarousel-2" data-slide="next"></a>
                        </span>
                        </h4>
                        <div id="myCarousel-2" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <? foreach ($lastWeekProducts as $key => $fourProducts) { ?>
                                    <div class=" <?= $key === 0 ? 'active' : '' ?> item">
                                        <ul class="thumbnails">
                                            <? foreach ($fourProducts as $product) { ?>
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p>
                                                            <a href="product_details.php/?id=<?= $product['id'] ?>">
                                                                <img src="Assets/Images/<?= $product['image_name'] ?>" alt=""/>
                                                            </a>
                                                        </p>
                                                        <a href="product_details.php/?id=<?= $product['id'] ?>" class="title"> <?= $product['name'] ?></a><br/>
                                                        <a href="products" class="category"> <?= $product['brand'] ?></a>
                                                        <p class="price">$ <?= $product['price'] ?></p>
                                                    </div>
                                                </li>
                                            <? } ?>
                                        </ul>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row feature_box">
                    <div class="span4">
                        <div class="service">
                            <div class="responsive">
                                <img src="Assets/Images/HomePage/support_1.png" alt=""/>
                                <h4>EN YENİ <strong>TEKNOLOJİ</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="customize">
                                <img src="Assets/Images/HomePage/support_2.png" alt=""/>
                                <h4>ÜCRETSİZ <strong>KARGO</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="support">
                                <img src="Assets/Images/HomePage/support_3.png" alt=""/>
                                <h4>7/24 CANLI <strong>DESTEK</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require 'src/Layout/Foot.php'; ?>