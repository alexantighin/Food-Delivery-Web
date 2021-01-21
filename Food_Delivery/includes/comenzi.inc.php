<?php

session_write_close(); 
session_start();

require 'dbh.inc.php';

//preluare id_comanda si data_comanda despre COMENZI
$w=(int)$_SESSION['utilizator_id'];
$sql = "SELECT id_comanda, data_comanda from comenzi where id_utilizator=$w;";
$result = mysqli_query($conn, $sql);
$_SESSION['numar_comenzi']=mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0)
{
    for($j=0;$j<$_SESSION['numar_comenzi'];$j++)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_comanda'][$j] = $row['id_comanda'];
        $_SESSION['data_comanda'][$j] = $row['data_comanda'];
    }      
}

//preluare nume_produse concatenate din comenzi
$sql = "select produse_din_comanda.id_comanda, GROUP_CONCAT(produse.nume_produs SEPARATOR ', ') produse
from produse, produse_din_comanda, comenzi
where produse_din_comanda.id_produs = produse.id_produs and comenzi.id_comanda=produse_din_comanda.id_comanda and comenzi.id_utilizator=$w
GROUP BY produse_din_comanda.id_comanda;";
$result = mysqli_query($conn, $sql);
for($j=0;$j<$_SESSION['numar_comenzi'];$j++)
{
    $row = mysqli_fetch_assoc($result);
    $_SESSION['produse_comanda'][$j] = $row['produse']; 
}  

//calculare suma produse din comanda
$sql = "select produse_din_comanda.id_comanda, sum(produse.pret_produs) pret
from produse, produse_din_comanda , comenzi
where produse_din_comanda.id_produs = produse.id_produs and comenzi.id_comanda=produse_din_comanda.id_comanda and comenzi.id_utilizator=$w
GROUP BY produse_din_comanda.id_comanda;";
$result = mysqli_query($conn, $sql);
for($j=0;$j<$_SESSION['numar_comenzi'];$j++)
{
    $row = mysqli_fetch_assoc($result);
    $_SESSION['total_comanda'][$j] = $row['pret']; 
}
        
header("Location: ../comenzi.php");
exit();

?>
