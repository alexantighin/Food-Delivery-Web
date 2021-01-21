<?php
  require "header.php";
?>

<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container" style="padding-top:40px;">
            <form id="register_form_alb" action="includes/signup.inc.php" method="post">         
                <?php
                    // Mesajele de eroare
                    if (isset($_GET["error"])) 
                    {
                        if ($_GET["error"] == "campuri_libere") //eroare campuri necompletate
                        {
                            echo '<div class="alert alert-success" role="alert" id="alerta">
                                    <span><strong>Eroare!</strong>  Completeaza toate campurile!</span>
                                </div>';
                        }
                        else if ($_GET["error"] == "username_si_email_invalid") //eroare  Username si E-mail
                        {
                            echo '<div class="alert alert-success" role="alert" id="alerta">
                            <span><strong>Eroare!</strong>  Username si E-mail invalid!</span>
                        </div>';
                        }
                        else if ($_GET["error"] == "username_invalid") //eroare  Username
                        {
                            echo '<div class="alert alert-success" role="alert" id="alerta">
                            <span><strong>Eroare!</strong>  Username invalid!</span>
                        </div>';
                        }
                        else if ($_GET["error"] == "email_invalid")   //eroare  E-mail
                        {
                            echo '<div class="alert alert-success" role="alert" id="alerta">
                            <span><strong>Eroare!</strong>  E-mail invalid!</span>
                        </div>';
                        }
                        else if ($_GET["error"] == "parolele_nu_se potrivesc") //eroare  Parole diferite
                        {
                            echo '<div class="alert alert-success" role="alert" id="alerta">
                            <span><strong>Eroare!</strong>  Parolele nu corespund!</span>
                        </div>';
                        }
                        else if ($_GET["error"] == "username_deja_folosit") //eroare  Username-ul folosit
                        {
                            echo '<div class="alert alert-success" role="alert" id="alerta">
                            <span><strong>Eroare!</strong>  Username-ul este deja folosit!</span>
                        </div>';
                        }
                        else if ($_GET["error"] == "telefon_incorect") //eroare  Username-ul folosit
                        {
                            echo '<div class="alert alert-success" role="alert" id="alerta">
                            <span><strong>Eroare!</strong>  Telefonul nu este corect!</span>
                        </div>';
                        }   
                  }
                  // Mesaj de succes
                  else if (isset($_GET["signup"])) 
                  {
                    if ($_GET["signup"] == "success") 
                    {
                        echo '<div class="alert alert-success" role="alert" id="alerta">
                            <span><strong>Succes!</strong>  Inregistrarea a reusit!</span>
                        </div>';
                    }
                  }
              ?>                    
            <?php                    
                    if (!empty($_GET["uid"])) //creare camp USERNAME
                    {
                        echo '
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input class="form-control item" type="text" name="uid" id="name" value="'.$_GET["uid"].'">
                        </div>';
                    }
                    else
                    {
                        echo '
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input class="form-control item" type="text" name="uid" id="name">
                        </div>';
                    }
                    
                    if (!empty($_GET["mail"]))  //creare camp EMAIL
                    {
                        echo'
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control item" type="text" name="mail" id="name" value="'.$_GET["mail"].'">
                        </div>';
                    }
                    else
                    {
                       echo'
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control item" type="text" name="mail" id="name">
                        </div>'; 
                    }
                    
                    ?>
                    <div class="form-group">    
                        <label for="password">Parola</label>
                        <input class="form-control item" type="password"  name="pwd" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password">Repeta Parola</label>
                        <input class="form-control item" type="password" name="pwd-repeat" id="password">
                    </div>
                    <div class="form-group">
                        <label for="name">Nume</label>
                        <input class="form-control item" type="text" name="nume" id="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Prenume</label>
                        <input class="form-control item" type="text" name="prenume" id="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Adresa</label>
                        <input class="form-control item" type="text" name="adresa" id="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Telefon</label>
                        <input class="form-control item" type="text" name="telefon" id="email">
                    </div>
                
                    <button class="btn btn-primary btn-block" type="submit" name="signup-submit" id="register_buton_signup" style="/*background-color:#330867;*/">Sign Up</button>                    
            </form>
        </div>
    </section>
</main>

<?php
  require "footer.php";
?>