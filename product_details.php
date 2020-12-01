<?php
require 'src/Layout/Head.php';

// save to card if user added a product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!$isLoggedIn) {
        header("location: product_details.php");
        exit;
    }

    $userId = $_SESSION["id"];
    if (!isset($_SESSION["orderId"])) {
        $sql = "INSERT INTO orders (user_id) VALUES (?)";
        $pdo->prepare($sql)->execute([$userId]);
        $_SESSION["orderId"] = $pdo->lastInsertId();
    }
    $orderId = $_SESSION["orderId"];

    $sql = "INSERT INTO order_product (order_id, product_id, product_count) VALUES (?,?,?)";
    $pdo->prepare($sql)->execute([$orderId, $_POST["productId"], $_POST["productCount"]]);
}


$stm = $pdo->prepare("SELECT * FROM products WHERE id = {$_GET['id']}");
$stm->execute();
$product = $stm->fetch(PDO::FETCH_ASSOC);

$stm = $pdo->prepare("SELECT * FROM products WHERE category_id = {$product['category_id']} AND id != {$_GET['id']}");
$stm->execute();
$products = $stm->fetchAll(PDO::FETCH_ASSOC);
$relatedProducts = [];
$rowsCount = -1;
foreach ($products as $key => $p) {
    if ($key % 4 === 0) {
        $rowsCount++;
    }
    $relatedProducts[$rowsCount][$key % 4] = $p;
}
?>

    <section class="header_text sub">
        <img class="pageBanner" src="Assets/Images/Slade.jpg" alt="New products">
        <h4><span>Ürün Ayrıntısı</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <div class="row">
                    <div class="span4">
                        <a href="Assets/Images/<?= $product['image_name'] ?>.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 1">
                            <img alt="" src="Assets/Images/<?= $product['image_name'] ?>">
                        </a>
                    </div>
                    <div class="span5">
                        <address>
                            <strong>Marka:</strong> <span><?= $product['brand'] ?></span><br>
                            <strong>Ürün Kodu:</strong> <span><?= $product['code'] ?></span><br>
                            <strong>Ödül Puanları:</strong> <span><?= $product['points'] ?></span><br>
                        </address>
                        <h4><strong>Fiyat: $<?= $product['price'] ?></strong></h4>
                    </div>
                    <div class="span5">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?=$product['id']?>" method="post" class="form-inline">
                            <p>&nbsp;</p>
                            <label>Adet:</label>
                            <input type="number" name="productCount" class="span1" value="1">
                            <input type="hidden" name="productId" value="<?= $product['id'] ?>">
                            <button class="btn btn-inverse" type="submit">Sepete Ekle</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="span9">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#description">Açıklama</a></li>
                            <li class=""><a href="#extra-info">Ek Bilgi</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="description"><?= $product['description'] ?></div>
                            <div class="tab-pane" id="extra-info">
                                <table class="table table-striped shop_attributes">
                                    <tbody>
                                    <tr class="">
                                        <th>Boyut</th>
                                        <td><?= $product['size'] ?></td>
                                    </tr>
                                    <tr class="alt">
                                        <th>Renk</th>
                                        <td><?= $product['color'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="span9">
                        <br>
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><strong>İlgili</strong> Ürünler</span></span>
                            <span class="pull-right">
                            <a class="left button" href="#myCarousel-1" data-slide="prev"></a>
                            <a class="right button" href="#myCarousel-1" data-slide="next"></a>
                        </span>
                        </h4>
                        <div id="myCarousel-1" class="carousel slide">
                            <div class="carousel-inner">
                                <? foreach ($relatedProducts as $key => $fourProducts) { ?>
                                    <div class=" <?= $key === 0 ? 'active' : '' ?> item">
                                        <ul class="thumbnails">
                                            <? foreach ($fourProducts as $relatedProduct) { ?>
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="<?= $baseUrl ?>product_details/<?= $relatedProduct['id'] ?>"><img
                                                                        src="Assets/Images/<?= $relatedProduct['image_name'] ?>" alt=""/></a></p>
                                                        <a href="<?= $baseUrl ?>product_details/<?= $relatedProduct['id'] ?>"
                                                           class="title"> <?= $relatedProduct['name'] ?></a><br/>
                                                        <a href="<?= $baseUrl ?>products" class="category"><?= $relatedProduct['brand'] ?></a>
                                                        <p class="price">$<?= $relatedProduct['price'] ?></p>
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
            </div>
            <? require 'src/CommonComponents/RelatedSideBar.php' ?>
        </div>
    </section>

    <script>
      $(function () {
        $('#myTab a:first').tab('show');
        $('#myTab a').click(function (e) {
          e.preventDefault();
          $(this).tab('show');
        })
      })
      $(document).ready(function () {
        $('.thumbnail').fancybox({
          openEffect: 'none',
          closeEffect: 'none'
        });

        $('#myCarousel-2').carousel({
          interval: 2500
        });
      });
    </script>

<?php require 'src/Layout/Foot.php'; ?>