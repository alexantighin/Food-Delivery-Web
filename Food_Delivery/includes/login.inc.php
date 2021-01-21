<?php
// Verificam daca a fost apasat butonul de LOGIN
if (isset($_POST['login-submit'])) 
{ 
  require 'dbh.inc.php';

  // Atribuim valori variabilelor
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  // Verificam daca au fost introduse date
  if (empty($mailuid) || empty($password)) 
  {
    header("Location: ../index.php?error=nu_s-au_introdus_date_in_username_si_parola");
    exit();
  }
  else 
  {
    //trebuie decriptata parola din baza de date
    
    $sql = "SELECT * FROM utilizatori WHERE user_utilizator=? OR email_utilizator=?;";
      
    //initializare sesiune catre baza de date
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
      header("Location: ../index.php?error=eroare_sql");
      exit();
    }
    else 
    {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
        //executie comanda sql
      mysqli_stmt_execute($stmt);
        //atribuire rezultate primite
      $result = mysqli_stmt_get_result($stmt);
      // stocare rezultate primite intr-o variabila
      if ($row = mysqli_fetch_assoc($result)) 
      {
          //comparare parola introdusa cu cea din baza de date
          if($password == $row['parola_utilizator'])
          {
              $pwdCheck = true;
          }
          else
          {
              $pwdCheck = false;
          }         
          
          
          
        // daca parole nu se potrivesc afisam eroare
        if ($pwdCheck == false) 
        {
          header("Location: ../index.php?error=parola_gresita");
          exit();
        }
        else if ($pwdCheck == true) 
        {        
            // pornim sesiunea
            session_start();            
            // Cream variabilele
            $_SESSION['utilizator_id'] = $row['id_utilizator'];
            $_SESSION['utilizator_user'] = $row['user_utilizator'];
            $_SESSION['utilizator_email'] = $row['email_utilizator'];
            
            //preluarea datelor din detalii_utilizator
            require 'dbh.inc.php';            
            $w=(int)$_SESSION['utilizator_id'];            
            $sql = "select * from detalii_utilizatori where id_utilizator=$w;";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);    
                $_SESSION['utilizator_nume'] = $row['nume_utilizator'];
                $_SESSION['utilizator_prenume'] = $row['prenume_utilizator'];
                $_SESSION['utilizator_adresa'] = $row['adresa_utilizator'];
                $_SESSION['utilizator_telefon'] = $row['telefon_utilizator'];                
            }

            
            //Ne intoarcem la pagina de start
            header("Location: ../index.php");
            exit();
        }
      }
      else 
      {
        header("Location: ../index.php?login=dateincorecte");
        exit();
      }
    }
  }   
}
else 
{
  // in caz ca se acceseaza pagina in alt mod, se acceseaza pagina de signup
  header("Location: ../signup.php");
  exit();
}
