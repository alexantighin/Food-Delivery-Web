<?php

session_write_close(); 
session_start();

//verificare pe ce buton de adaugare in cos s-a apasat si inserare in cos produsul respectiv
for($i=0;$i<$_SESSION['numar_produse'];$i++)
{
    if (isset($_POST['buton_add_produs'][$i] ))
    {
        $w=(int)$_SESSION['utilizator_id'];
        $y=(int)$_SESSION['id_produs'][$i];
        require 'dbh.inc.php';
            
        $sql = "INSERT INTO cos (id_produs,id_utilizator) VALUES($y,$w);";
        if (!$conn) 
        {
				die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_query($conn, $sql);
    }        
}
header("Location: ../meniu.php");
exit();   

?>