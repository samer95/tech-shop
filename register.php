<?php
require 'src/Layout/Head.php';

if ($isLoggedIn) {
    header("location: index.php");
    exit;
}

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {
        $stm = $pdo->prepare("SELECT * FROM users WHERE username LIKE '{$username}'");
        $stm->execute();
        $users = $stm->fetchAll(PDO::FETCH_ASSOC);

        if (count($users) == 1) {
            $user = $users[0];
            if ($password == $user['password']) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $user['id'];
                $_SESSION["username"] = $username;
                header("location: index.php");
            } else {
                $password_err = "The password you entered was not valid.";
            }
        } else {
            $username_err = "No account found with that username.";
        }
    }
}
?>

    <section class="header_text sub">
        <img class="pageBanner" src="Assets/Images/Slade.jpg" alt="New products">
        <h4><span>Giriş Yap veya Kaydol</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span5">
                <h4 class="title"><span class="text"><strong>Giriş</strong> Formu</span></h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="next" value="/">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Kullanıcı Adı</label>
                            <div class="controls">
                                <input
                                        type="text"
                                        placeholder="Kullanıcı adınızı giriniz"
                                        name="username"
                                        class="input-xlarge <?= !empty($username_err) ? 'has-error' : ''; ?>"
                                >
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Parola</label>
                            <div class="controls">
                                <input
                                        type="password"
                                        placeholder="Şifrenizi Girin"
                                        name="password"
                                        class="input-xlarge <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"
                                >
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <input tabindex="3" class="btn btn-inverse large" type="submit" value="Hesabınıza giriş yapın">
                            <hr>
                            <p class="reset">Kullanıcı adınızı veya şifrenizi <a tabindex="4" href="#" title="Recover your username or password">kurtarın</a>
                            </p>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="span7">
                <h4 class="title"><span class="text"><strong>Kaydolma</strong> Formu</span></h4>
                <form action="#" method="post" class="form-stacked">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Kullanıcı Adı</label>
                            <div class="controls">
                                <input type="text" placeholder="Kullanıcı adınızı giriniz" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">E-posta:</label>
                            <div class="controls">
                                <input type="password" placeholder="E-postanızı giriniz" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Parola:</label>
                            <div class="controls">
                                <input type="password" placeholder="Şifrenizi girin" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
                        </div>
                        <hr>
                        <div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="hesabını oluştur"></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>

    <style>
        .has-error {
            border-color: red !important;
            border-width: 1px !important;;
            border-style: double !important;;
        }
        .help-block {
            color: red;
            font-weight: bold;
        }
    </style>

<?php require 'src/Layout/Foot.php'; ?>