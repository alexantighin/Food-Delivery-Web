<?php
  require "header.php";
?>

<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container" style="padding-top:40px;">
            <form id="register_form_alb" action="includes/date_user.inc.php" method="post">
                <?php                   
                    echo '
                    <div class="form-group">
                        <label for="name">Username</label>                        
                        <input class="form-control item" type="text" name="uid" value="' . htmlspecialchars($_SESSION['utilizator_user']) . '"placeholder="Username:">       
                    </div>';                 
                    
                    echo '
                    <div class="form-group">
                        <label for="name">E-mail</label>
                        <input class="form-control item" type="text" name="mail" value="' . htmlspecialchars($_SESSION['utilizator_email']) . '"placeholder="E-mail:">
                    </div>';
                    
               
                    echo'<div class="form-group">
                        <label for="email">Nume</label>
                        <input class="form-control item" type="text" name="nume" value="' . htmlspecialchars($_SESSION['utilizator_nume']) . '"placeholder="Nume:">
                    </div>'; 
                    
                    
            
                    echo '<div class="form-group">
                        <label for="email">Prenume</label>
                        <input class="form-control item" type="text" name="prenume" value="' . htmlspecialchars($_SESSION['utilizator_prenume']) . '"placeholder="Prenume:">
                    </div>';  
              
                
             
                    echo '<div class="form-group">
                        <label for="email">Adresa</label>
                        <input class="form-control item" type="text" name="adresa" value="' . htmlspecialchars($_SESSION['utilizator_adresa']) . '"placeholder="Adresa:">
                    </div>';
           
             
                    
                    echo '<div class="form-group">
                        <label for="email">Telefon</label>
                        <input class="form-control item" type="text" name="telefon" value="' . htmlspecialchars($_SESSION['utilizator_telefon']) . '"placeholder="Telefon:">
                    </div>';
              
               ?>
                    
                    <button class="btn btn-primary btn-block" id="register_buton_signup" type="submit" name="salvare-submit" >Salvare</button>
            </form>
        </div>
    </section>
</main>

<?php
  require "footer.php";
?>