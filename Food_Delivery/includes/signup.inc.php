<?php
// verificare daca a fost apasat butonul de SIGN UP
if (isset($_POST['signup-submit']))
{
  require 'dbh.inc.php';    //conecatre la baza de date

  // luam datele din introduse in campurile din signup.php
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  $numeUtilizator = $_POST['nume'];
  $prenumeUtilizator = $_POST['prenume'];
  $adresaUtilizator = $_POST['adresa'];
  $telefonUtilizator = $_POST['telefon'];    
    

  //verificam daca sunt erori

  //verificare daca au fost intoduse date in toate campurile
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($numeUtilizator) || empty($prenumeUtilizator) || empty($adresaUtilizator) || empty($telefonUtilizator)) 
  {
    header("Location: ../signup.php?error=campuri_libere");
    exit();
  }
  // verificare username si email
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) 
  {
    header("Location: ../signup.php?error=username_si_email_invalid");
    exit();
  }
  // verificare username, doar litere si cifre
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) 
  {
    header("Location: ../signup.php?error=username_invalid");
    exit();
  }
  // verificare email invalid
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
  {
    header("Location: ../signup.php?error=email_invalid");
    exit();
  }
  // verificare daca au fost introduse aceleasi parole
  else if ($password !== $passwordRepeat) 
  {
    header("Location: ../signup.php?error=parolele_nu_se potrivesc");
    exit();
  }
    
 else if ($telefonUtilizator[0] != '0' ) 
  {
    header("Location: ../signup.php?error=telefon_incorect");
    exit();
  }
  else 
  {

    // verificare daca mai exista un username identic in baza de date
    $sql = "SELECT user_utilizator FROM utilizatori WHERE user_utilizator=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
      header("Location: ../signup.php?error=eroare_sql_utilizator_folosit");
      exit();
    }
    else 
    {
      // "s" = "string", "i" = "integer", "b" = "blob", "d" = "double".
      // adaugare in comanda sql username-ul
      mysqli_stmt_bind_param($stmt, "s", $username);
      // executie comanda sql
      mysqli_stmt_execute($stmt);
      // stocare rezultat primit
      mysqli_stmt_store_result($stmt);
      // calculare numar de randuri primite
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);
      // daca sunt mai multe randuri atunci username-ul este folosit
      if ($resultCount > 0) 
      {
        header("Location: ../signup.php?error=username_deja_folosit");
        exit();
      }
      else 
      {

        // inserare date in baza de date
        $sql = "INSERT INTO utilizatori (user_utilizator, email_utilizator, parola_utilizator) VALUES (?, ?, ?);";
        // initializare o noua comanda sql folosit conexiunea din dbh.inc.php
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) 
        {
          header("Location: ../signup.php?error=eroare_sql");
          exit();
        }
        else 
        {        
          // adaugare in comanda sql parametrii necesari
          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
          //executie comanda sql
          mysqli_stmt_execute($stmt);
            
            
            require 'dbh.inc.php';            
            $w=(int)$_SESSION['utilizator_id'];            
            $sql = "select * from utilizatori where user_utilizator='$username';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);    
                $w=(int)$row['id_utilizator'];      
            }            
            $sql = "INSERT INTO detalii_utilizatori (nume_utilizator,prenume_utilizator,adresa_utilizator,telefon_utilizator, id_utilizator) VALUES ('$numeUtilizator', '$prenumeUtilizator', '$adresaUtilizator', '$telefonUtilizator', $w);";
            mysqli_query($conn, $sql);
          header("Location: ../signup.php?signup=success");            
          exit();
        }
      }
    }
  }
  // inchidere conexiune
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../signup.php");
  exit();
}
