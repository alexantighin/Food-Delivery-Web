<?php
  require "header.php";
?>

<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info" id="scris_cos">Cos</h2>
            </div>
            <div class="content">
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-8">
                        <form class="form-date_user" action="includes/cos.inc.php" method="post">
                            <?php
                                for($i=0;$i<$_SESSION['numar_produse_din_cos'];$i++)    //afisare toate produse din cos
                                {
                                    //afisare produs din cos
                                    echo '<div class="items">
                                            <div class="product">
                                                <div class="row justify-content-center align-items-center">
                                                    <div class="col-md-3">
                                                        <div id="cos_div_imagine" class="product-image">
                                                            <img class="img-fluid d-block mx-auto image" src="assets/img/produse/'.htmlspecialchars($_SESSION['imagine_produs_din_cos'][$i]).'">
                                                        </div>
                                                    </div>
                                                <div class="col-md-5 product-info">
                                                    <a href="#" id="cos_nume_produs" class="product-name">' . htmlspecialchars($_SESSION['nume_produs_din_cos'][$i]) . '</a>
                                                </div>
                                                <div class="col-6 col-md-2 price">
                                                    <span>' . htmlspecialchars($_SESSION['valoare_produs_din_cos'][$i]) .'</span>
                                                </div>
                                                <div class="col-6 col-md-2 price">
                                                    <button class="btn btn-primary" type="submit" name="buton_sterge_produs_cos['.$i.']"    id="buton_stergere">X</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>';
                                }                           
                                ?>                                
                    </form>
                </div>
                    <div class="col-md-12 col-lg-4">    
                        <div id="cos_div_dreapta" class="summary">
                            <h3 id="cos_sumar">Sumar</h3>
                            <h4 id="patrat_total">
                                <span id="total" class="text">Total</span>
                                <?php echo'<span id="pret_total" class="price">'. $_SESSION['total_din_cos'] . ' RON</span>';?>
                            </h4>
                            <form class="form-date_user" action="includes/cos.inc.php" method="post">
                                <?php echo' <button class="btn btn-primary btn-block btn-lg" type="submit" name="cumpara" id="cos_buton_cumpara">Cumpara</button>';?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
  require "footer.php";
?>

