<?php
       
session_write_close(); 
session_start();

//verificare daca s-a apasat butonul spre meniu MENIU COMPLET
if (isset($_POST['meniu_complet'] ))
{    
    $sql = "SELECT * FROM categorii ORDER BY id_categorie;";
    require 'dbh.inc.php';
    if (!$conn) 
    {
		die("Connection failed: " . mysqli_connect_error());
	}
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) 
    {
        $_SESSION['numar_categorii']=mysqli_num_rows($result);  //stocare numar de categorii
        while($row = mysqli_fetch_assoc($result)) 
        {
            $_SESSION['id_categorie'][] = $row['id_categorie'];
            $_SESSION['nume_categorie'][] = $row['nume_categorie'];
        }
    }            
    $_SESSION['apasare']=(int)$_SESSION['id_categorie'][0]; //butonul care selecteaza categoria este setat pe categoria cu id=1        
    $x=(int)$_SESSION['id_categorie'][0];   //preluare produse pentru categoria cu id=1
    $sql = "SELECT * FROM produse, categorii where produse.id_categorie=categorii.id_categorie and categorii.id_categorie=$x;";
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    $_SESSION['numar_produse']=mysqli_num_rows($result);    //stocare numar de produse din categoria cu id=1
    if (mysqli_num_rows($result) > 0)
    {
        for($j=0;$j<$_SESSION['numar_produse'];$j++)    //stocare date despre produsele din categoria cu id=1
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_produs'][$j] = $row['id_produs'];
            $_SESSION['nume_produs'][$j] = $row['nume_produs'];
            $_SESSION['descriere_produs'][$j] = $row['descriere_produs'];
            $_SESSION['imagine_produs'][$j] = $row['imagine_produs'];
            $_SESSION['pret_produs'][$j] = $row['pret_produs'];
        }      
    }
}

//verificare ce categorie a fost selectata si preluare date despre produse
for($i=0;$i<$_SESSION['numar_categorii'];$i++)
{
    if (isset($_POST['buton_categorie'][$i] ))
    {
        $_SESSION['apasare']=$_SESSION['id_categorie'][$i];
        $x=(int)$_SESSION['apasare'];
        require 'dbh.inc.php';
        $sql = "SELECT * FROM produse, categorii where produse.id_categorie=categorii.id_categorie and categorii.id_categorie=$x;";
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = mysqli_query($conn, $sql);
        $_SESSION['numar_produse']=mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0)
        {
            for($j=0;$j<$_SESSION['numar_produse'];$j++)
            {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['id_produs'][$j] = $row['id_produs'];
                $_SESSION['nume_produs'][$j] = $row['nume_produs'];
                $_SESSION['pret_produs'][$j] = $row['pret_produs'];
                $_SESSION['descriere_produs'][$j] = $row['descriere_produs'];
                $_SESSION['imagine_produs'][$j] = $row['imagine_produs'];
            } 
        }
    }
}

header("Location: ../meniu.php");
exit();

?>


 