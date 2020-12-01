<div id="top-bar" class="container">
    <div class="row">
        <div class="span4">
            <form method="POST" class="search_form">
                <input type="text" class="input-block-level search-query" Placeholder="Örneğin. Tişört">
            </form>
        </div>
        <div class="span8">
            <div class="account pull-right">
                <ul class="user-menu">
                    <? echo $isLoggedIn ? '<li><a href="cart.php">Alışveriş Sepetiniz</a></li>': '' ?>
                    <? echo $isLoggedIn ? '<li><a href="checkout.php">Ödeme</a></li>': '' ?>
                    <? echo $isLoggedIn ? '<li><a href="logout.php">Çıkış Yap</a></li>': '' ?>
                    <? echo !$isLoggedIn ? '<li><a href="register.php">Giriş Yap / Oturum Aç</a></li>': '' ?>
                </ul>
            </div>
        </div>
    </div>
</div>