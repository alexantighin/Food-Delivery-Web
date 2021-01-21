<?php
  require "header.php";
?>

<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                    <h2 class="text-info" id="scris_meniu_complet">Comenzi</h2>
            </div>
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="products" style="margin-top:10px;">
                            <div class="row no-gutters" id="div_rand">
                                <?php
                                    for($i=0;$i<$_SESSION['numar_comenzi'];$i++)    //afisare toate comenzile
                                    {
                                        //afisare comanda
                                        echo '<div class="col-12 col-md-6 col-lg-4" id="coloana_produs" style="height:244px;">
                                                <div id="div_produs" class="clean-product-item">
                                                    <div id="descriere_produs" class="product-name">
                                                        <h1 id="nume_produs">' . htmlspecialchars($_SESSION['data_comanda'][$i]) . '</h1>
                                                        <p id="descriere_produs" style="height:113px;">' . htmlspecialchars($_SESSION['produse_comanda'][$i]) . '</p>
                                                    </div>
                                                    <div class="about">
                                                        <div class="price" style="margin-left:35%;">
                                                            <h3>' . htmlspecialchars($_SESSION['total_comanda'][$i]) . ' RON</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                    }
                                ?>
                            </div>
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