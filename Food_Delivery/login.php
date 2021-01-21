<?php
  require "header.php";
?>

<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <p><img src="assets/img/icons8-padlock (2).png"></p>
            </div>
            <form id="form_alb_login" action="includes/login.inc.php" method="post">
                <div class="form-group"> 
                    <label for="email">Username / Email</label>
                    <input class="form-control item" type="text" name="mailuid" id="email" styles="border-radius:50px;">
                </div>
                <div class="form-group">
                    <label for="password">Parola</label>
                    <input class="form-control" type="password" name="pwd" id="password" styles="border-radius:15px;">
                </div>
                <button class="btn btn-primary btn-block" type="submit" name="login-submit" id="buton_login_submit">LOG IN</button>
            </form>
        </div>
    </section>
</main>

<?php
  require "footer.php";
?>