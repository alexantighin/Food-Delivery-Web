<?php
  require "header.php";
?>

<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info" id="scris_meniu_complet">Meniu Complet</h2>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-none d-md-block">
                            <div class="filters">
                                <div class="filter-item">
                                    <form class="form-categorii" action="includes/meniu.inc.php" method="post">
                                        <?php
                                        if (isset($_SESSION['utilizator_id']))  //verifica daca utilizatorul este logat
                                        {
                                            $x=(int)$_SESSION['apasare']; //selectare numar categorie
                                           for($i=0;$i<$_SESSION['numar_categorii'];$i++)
                                           {
                                               if(($i+1) == $x) //daca categoria este activa atunci se creaza buton corespunzator
                                               {
                                                    echo'<button class="btn btn-primary" type="submit" name="buton_categorie['.$i.']"  id="meniu_buton_categorie" >' . htmlspecialchars($_SESSION['nume_categorie'][$i]) . '</button>';   
                                               }
                                               else
                                               {
                                                   echo'<button class="btn btn-primary" type="submit" name="buton_categorie['.$i.']" id="meniu_buton_categorie_nefolosita" style="background-color:#f6f6f6;color:#A2A4AB;width:195px;height:63px;font-family:Roboto, sans-serif;font-size:28px;margin-bottom:10px;margin-top:10px;">' . htmlspecialchars($_SESSION['nume_categorie'][$i]) . '</button>';    
                                               }                                                                                          
                                           }                                            
                                        }
                                        ?>
                                    </form>                              
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-md-none">
                            <a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" role="button" href="#filters">Categorii<i class="icon-arrow-down filter-caret"></i></a>
                            <div class="collapse" id="filters">
                                <div class="filters">
                                    <div class="filter-item">
                                        <form class="form-categorii" action="includes/meniu.inc.php" method="post">
                                            <?php
                                                //versiunea de telefon
                                                if (isset($_SESSION['utilizator_id']))
                                                {
                                                    $x=(int)$_SESSION['apasare']; 
                                                    for($i=0;$i<$_SESSION['numar_categorii'];$i++)
                                                    {
                                                        if(($i+1) == $x)
                                                        {
                                                            echo '<button class="btn btn-primary" type="submit" name="buton_categorie['.$i.']" name="buton_categorie" id="meniu_buton_categorie">' . htmlspecialchars($_SESSION['nume_categorie'][$i]) . '</button>';
                                                        }
                                                        else
                                                        {
                                                           echo '<button
                                                class="btn btn-primary" type="submit" name="buton_categorie['.$i.']" name="buton_categorie" id="meniu_buton_categorie_nefolosita" style="background-color:#f6f6f6;color:#A2A4AB;width:195px;height:63px;font-family:Roboto, sans-serif;font-size:28px;margin-bottom:10px;margin-top:10px;">' . htmlspecialchars($_SESSION['nume_categorie'][$i]) . '</button>'; 
                                                        }
                                                        
                                                    }
                                                }
                                            ?>                                      
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="products" style="margin-top:10px;">
                            <div class="row no-gutters" id="div_rand">
                                <?php
                                    for($i=0;$i<$_SESSION['numar_produse'];$i++)    //afisare produse din categoria selectata
                                    {
                                        //afisare un produs
                                        echo '<div class="col-12 col-md-6 col-lg-4" id="coloana_produs">
                                                <div id="div_produs" class="clean-product-item">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img class="img-fluid d-block mx-auto" src="assets/img/produse/'.htmlspecialchars($_SESSION['imagine_produs'][$i]).'">
                                                        </a>
                                                    </div>
                                                <div id="descriere_produs" class="product-name" style="height:100px">
                                                    <h1 id="nume_produs">' . htmlspecialchars($_SESSION['nume_produs'][$i]) . '</h1>
                                                    <p id="descriere_produs" style="height:113px;">' . htmlspecialchars($_SESSION['descriere_produs'][$i]) . '<br></p>
                                                </div>                                        
                                            <div class="about">                                                
                                                <div class="rating">
                                                    <form class="form-produse" action="includes/produse.inc.php" method="post">
                                                        <button class="btn btn-primary" id="buton_adauga" type="submit" name="buton_add_produs['.$i.']" >Adauga</button>
                                                    </form>
                                                </div>
                                                <div class="price">
                                                    <h3>' . htmlspecialchars($_SESSION['pret_produs'][$i]) . ' RON</h3>
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
