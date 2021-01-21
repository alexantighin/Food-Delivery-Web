<?php
// verificare daca a fost apasat butonul de SALVARE
if (isset($_POST['salvare-submit']))
{
    require 'dbh.inc.php';
    session_write_close(); 
    session_start();

    $w=(int)$_SESSION['utilizator_id'];

    // luam datele din introduse in signup.php
    $id = $w;
    $username = $_POST['uid'];
    $email = $_POST['mail']; 
    $numeUtilizator = $_POST['nume'];
    $prenumeUtilizator = $_POST['prenume'];
    $adresaUtilizator = $_POST['adresa'];
    $telefonUtilizator = $_POST['telefon'];
    
    //actualizare user si email
    $sql = "UPDATE utilizatori SET user_utilizator=?, email_utilizator=? WHERE id_utilizator=?;";

    // initializare conexiune catre baza de date
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
        header("Location: ../date_user.php?error=sqlerror");
        exit();
    }
    else 
    {
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $id);
        mysqli_stmt_execute($stmt);        

        //actualizare detalii utilizator
        require 'dbh.inc.php';            
        $w=(int)$_SESSION['utilizator_id'];            
        $sql = "UPDATE detalii_utilizatori SET nume_utilizator='$numeUtilizator', prenume_utilizator='$prenumeUtilizator', adresa_utilizator='$adresaUtilizator', telefon_utilizator='$telefonUtilizator' WHERE id_utilizator=$w;";
        mysqli_query($conn, $sql);       
        
        
        require 'dbh.inc.php';
        //preluare datele actualizate din baza de date dupa update
        session_write_close(); 
        session_start();
        $w=(int)$_SESSION['utilizator_id'];       
        
        //preluarea datelor dupa update
        require 'dbh.inc.php';
        $sql = "select * from utilizatori where id_utilizator=$w;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);    
            $_SESSION['utilizator_id'] = $row['id_utilizator'];
            $_SESSION['utilizator_user'] = $row['user_utilizator'];
            $_SESSION['utilizator_email'] = $row['email_utilizator'];               
        }
        
        require 'dbh.inc.php';
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

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header("Location: ../date_user.php");            
        exit();
    }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
}
else 
{
  header("Location: ../date_user.php");
  exit();
}
