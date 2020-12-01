<?
require 'src/Layout/Head.php';

if (!$isLoggedIn) {
    header("location: index.php");
    exit;
}

$stm = $pdo->prepare("
                            SELECT
                                order_product.product_id AS product_id,
                                products.image_name AS product_name,
                                products.image_name AS product_image_name,
                                products.price AS product_price,
                                SUM(order_product.product_count) AS product_num,
                                SUM(products.price * order_product.product_count) AS product_total_price
                            FROM order_product
                            LEFT JOIN orders ON orders.id = order_product.order_id
                            LEFT JOIN products ON products.id = order_product.product_id
                            WHERE completed = 0 AND orders.user_id = 1
                            GROUP BY order_product.product_id
                     ");
$stm->execute();
$cardProducts = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

    <section class="header_text sub">
        <img class="pageBanner" src="Assets/Images/Slade.jpg" alt="New products">
        <h4><span>Alışveriş Sepetiniz</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Alışveriş</strong> Sepetiniz</span></h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Kaldırmak</th>
                        <th>Görüntü</th>
                        <th>Ürün İsmi</th>
                        <th>Miktar</th>
                        <th>Birim Fiyat</th>
                        <th>Toplam</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                    $totalPriceSum = 0;
                    foreach ($cardProducts as $product) {
                        $totalPriceSum += $product['product_total_price'];
                        ?>
                        <tr>
                            <td><input type="checkbox" value="seçenek1"></td>
                            <td>
								<a href="product_details.php?id=<?= $product['product_id'] ?>">
									<img alt="" src="Assets/Images/<?= $product['product_image_name'] ?>">
								</a>
                            </td>
                            <td><?= $product['product_name'] ?></td>
                            <td><input type="number" value="<?= $product['product_num'] ?>" class="input-mini"></td>
                            <td>$<?= $product['product_price'] ?></td>
                            <td>$<?= $product['product_total_price'] ?></td>
                        </tr>
                    <? } ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong>$<?= $totalPriceSum ?></strong></td>
                    </tr>
                    </tbody>
                </table>
                <h4>Bundan sonra ne yapmak istersiniz?</h4>
                <p>
					Kullanmak istediğiniz veya teslimat maliyetinizi tahmin etmek istediğiniz bir indirim
					kodunuz veya ödül puanınız olup olmadığını seçin.
				</p>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="seçenek1" checked="">
                    Kupon Kodunu Kullan
                </label>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="seçenek2">
                    Tahmini Nakliye &amp; Vergiler
                </label>
                <hr>
                <p class="cart-total right">
                    <strong>Toplam</strong>: $<?= $totalPriceSum ?><br>
                </p>
                <hr/>
                <p class="buttons center">
                    <button class="btn" type="button">Güncelleme</button>
                    <button class="btn" type="button">Devam Et</button>
                    <a class="btn btn-inverse" href="checkout.php">Çıkış Yap</a>
                </p>
            </div>
            <? require 'src/CommonComponents/RelatedSideBar.php' ?>
        </div>
    </section>

<?php require 'src/Layout/Foot.php'; ?>