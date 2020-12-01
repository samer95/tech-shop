<? require 'src/Layout/Head.php'; ?>
    <section class="header_text sub">
        <img class="pageBanner" src="Assets/Images/Slade.jpg" alt="New products">
        <h4><span>Çıkış Yapmak</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Checkout Options</a>
                        </div>
                        <div id="collapseOne" class="accordion-body in collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <h4>Yeni Müşteri</h4>
                                        <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the
                                            orders
                                            you have previously made.</p>
                                        <form action="#" method="post">
                                            <fieldset>
                                                <label class="radio" for="register">
                                                    <input type="radio" name="account" value="kaydol" id="register" checked="checked">Register Account
                                                </label>
                                                <label class="radio" for="guest">
                                                    <input type="radio" name="account" value="misafir" id="guest">Guest Checkout
                                                </label>
                                                <br>
                                                <button class="btn btn-inverse" data-toggle="collapse" data-parent="#collapse2">Continue</button>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="span6">
                                        <h4>Geri Gelen Müşteri</h4>
                                        <p>Ben Devamlı Müşteriyim</p>
                                        <form action="#" method="post">
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label">Kullanıcı Adı</label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Kullanıcı adınızı giriniz" id="username" class="input-xlarge">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Parola</label>
                                                    <div class="controls">
                                                        <input type="password" placeholder="Şifrenizi girin" id="password" class="input-xlarge">
                                                    </div>
                                                </div>
                                                <button class="btn btn-inverse">Devam Et</button>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Account &amp; Billing Details</a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <h4>Senin Kişisel Detayların</h4>
                                        <div class="control-group">
                                            <label class="control-label">Ad</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Soy Ad</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">E-posta</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Telefon</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Faks</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <h4>Your Address</h4>
                                        <div class="control-group">
                                            <label class="control-label">Şirket</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Şirket Kimliği:</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="required">*</span> Adres 1:</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Adres 2:</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="required">*</span> Şehir:</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="required">*</span> Posta Kodu:</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="required">*</span> Ülke:</label>
                                            <div class="controls">
                                                <select class="input-xlarge">
                                                    <option value="1">Afghanistan</option>
                                                    <option value="2">Albania</option>
                                                    <option value="3">Algeria</option>
                                                    <option value="4">American Samoa</option>
                                                    <option value="5">Andorra</option>
                                                    <option value="6">Angola</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="required">*</span> Bölge / Konum:</label>
                                            <div class="controls">
                                                <select name="zone_id" class="input-xlarge">
                                                    <option value=""> --- Lütfen Seçin ---</option>
                                                    <option value="3513">Aberdeen</option>
                                                    <option value="3514">Aberdeenshire</option>
                                                    <option value="3515">Anglesey</option>
                                                    <option value="3516">Angus</option>
                                                    <option value="3517">Argyll ve Bute</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">Confirm Order</a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <div class="control-group">
                                        <label for="textarea" class="control-label">Yorumlar</label>
                                        <div class="controls">
                                            <textarea rows="3" id="textarea" class="span12"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-inverse pull-right">Sipariş Onaylamak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require 'src/Layout/Foot.php'; ?>