<?php
  require "header.php";
?>

<main class="page landing-page">
        <section class="clean-block clean-hero">
            <div class="text">
                <h2 id="Fast_and_tasty" style="font-size:79px;">Fast and tasty</h2>
                <p id="good_food_good_mood">good food good mood</p>                
                <?php
                  if (!isset($_SESSION['utilizator_id']))   //daca utilizatorul NU este logat
                  {
                      //creare buton LOGIN INAINTE
                    echo '<button class="btn btn-outline-light btn-lg" type="button" id="buton_meniu_complet">LOGIN INAINTE</button>';                   
                  }
                  else if (isset($_SESSION['utilizator_id']))   //daca utilizatorul este logat
                  {
                      //creare buton catre MENIU
                    echo '<form action="includes/meniu.inc.php" method="post">
                            <a href="meniu.php">
                                <button class="btn btn-outline-light btn-lg" type="submit" name="meniu_complet" id="buton_meniu_complet">MENIU COMPLET</button>
                            </a>
                        </form>';
                  }
              ?>
            </div>
        </section>
</main>

<?php
  require "footer.php";
?>