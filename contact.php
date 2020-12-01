<? require 'src/Layout/Head.php'; ?>
    <section class="google_map">
        <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=74%2F6+Nguy%E1%BB%85n+V%C4%83n+Tho%E1%BA%A1i,+S%C6%A1n+Tr%C3%A0,+%C4%90%C3%A0+N%E1%BA%B5ng,+Vi%E1%BB%87t+Nam&amp;aq=0&amp;oq=74%2F6+Nguyen+Van+Thoai+Da+Nang,+Viet+Nam&amp;sll=37.0625,-95.677068&amp;sspn=41.546728,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=74+Nguy%E1%BB%85n+V%C4%83n+Tho%E1%BA%A1i,+Ng%C5%A9+H%C3%A0nh+S%C6%A1n,+Da+Nang,+Vietnam&amp;t=m&amp;ll=16.064537,108.24151&amp;spn=0.032992,0.039396&amp;z=14&amp;iwloc=A&amp;output=embed">
        </iframe>
    </section>
    <section class="header_text sub">
        <img class="pageBanner" src="Assets/Images/Slade.jpg" alt="New products">
        <h4><span>Bize Ulaşın</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span5">
                <div>
                    <h5>EK BİLGİ</h5>
                    <p><strong>Telefon:</strong>&nbsp;(123) 456-7890<br>
                        <strong>Faks:</strong>&nbsp;+04 (123) 456-7890<br>
                        <strong>E-posta:</strong>&nbsp;<a href="#">samer.lahlouh.95@hotmail.com</a>
                    </p>
                    <br/>
                    <h5>MERSİN İKİNCİ OFİSİ</h5>
                    <p><strong>Telefon:</strong>&nbsp;(113) 023-1125<br>
                        <strong>Faks:</strong>&nbsp;+04 (113) 023-1145<br>
                        <strong>E-posta:</strong>&nbsp;<a href="#">samer.lahlouh@gmail.com</a>
                    </p>
                </div>
            </div>
            <div class="span7">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                    inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <form method="post" action="#">
                    <fieldset>
                        <div class="clearfix">
                            <label for="name"><span>İsim:</span></label>
                            <div class="input">
                                <input tabindex="1" size="18" id="name" name="name" type="text" value="" class="input-xlarge" placeholder="İsim">
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="email"><span>E-posta:</span></label>
                            <div class="input">
                                <input tabindex="2" size="25" id="email" name="email" type="text" value="" class="input-xlarge" placeholder="E-posta">
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="message"><span>Mesaj:</span></label>
                            <div class="input">
                                <textarea tabindex="3" class="input-xlarge" id="message" name="body" rows="7" placeholder="Mesaj"></textarea>
                            </div>
                        </div>

                        <div class="actions">
                            <button tabindex="3" type="submit" class="btn btn-inverse">Mesaj Gönder</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>

<?php require 'src/Layout/Foot.php'; ?>