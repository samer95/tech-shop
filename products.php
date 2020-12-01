<?php
require 'src/Layout/Head.php';
$pageNumber = 1;
if (isset($_GET['page'])) {
    $pageNumber = $_GET['page'];
}
$offset = ($pageNumber - 1) * 10;

// prepare table data
$stm = $pdo->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT 10 OFFSET $offset");
$stm->execute();
$paginatedProducts = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $pdo->prepare("SELECT COUNT(id) AS productsNum FROM products");
$stm->execute();
$pagesNum = ceil($stm->fetch(PDO::FETCH_ASSOC)['productsNum'] / 10);
?>
    <section class="header_text sub">
        <img class="pageBanner" src="Assets/Images/Slade.jpg" alt="New products">
        <h4><span>Yeni Ürünler</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <ul class="thumbnails listing-products">
                    <? foreach ($paginatedProducts as $key => $product) { ?>
                        <li class="span3">
                            <div class="product-box">
                                <span class="sale_tag"></span>
                                <a href="<?= $baseUrl ?>product_details.php?id=<?= $product['id'] ?>">
                                    <img alt="" src="Assets/Images/<?= $product['image_name'] ?>"></a><br/>
                                <a href="<?= $baseUrl ?>product_details.php?id=<?= $product['id'] ?>" class="title"><?= $product['name'] ?></a><br/>
                                <a href="#" class="category"><?= $product['brand'] ?></a>
                                <p class="price">$<?= $product['price'] ?></p>
                            </div>
                        </li>
                    <? } ?>
                </ul>
                <hr>
                <div class="pagination pagination-small pagination-centered">
                    <ul>
                        <li><a href="?page=<?= $pageNumber - 1 ?>">Önceki</a></li>
                        <? for ($i = 1; $i <= $pagesNum; $i++) {
                            $class = $i == $pageNumber ? 'active' : '';
                            echo "<li class='$class'><a href='?page=$i'>$i</a></li>";
                        } ?>
                        <li><a href="?page=<?= $pageNumber + 1 ?>">Sonraki</a></li>
                    </ul>
                </div>
            </div>
            <? require 'src/CommonComponents/RelatedSideBar.php' ?>
        </div>
    </section>

<?php require 'src/Layout/Foot.php'; ?>