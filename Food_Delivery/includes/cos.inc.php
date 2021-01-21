<?php
session_write_close(); 
session_start();

//preluare date despre produsele din cos
$w=(int)$_SESSION['utilizator_id'];
require 'dbh.inc.php';
$sql = "SELECT produse.id_produs, produse.nume_produs, produse.pret_produs, produse.imagine_produs FROM cos, produse where cos.id_utilizator=$w and cos.id_produs=produse.id_produs;";
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, $sql);
$_SESSION['numar_produse_din_cos']=mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0)
{
    for($j=0;$j<$_SESSION['numar_produse_din_cos'];$j++)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_produs_din_cos'][$j] = $row['id_produs'];
        $_SESSION['nume_produs_din_cos'][$j] = $row['nume_produs'];
        $_SESSION['valoare_produs_din_cos'][$j] = $row['pret_produs'];
        $_SESSION['imagine_produs_din_cos'][$j] = $row['imagine_produs'];
    }      
}  

//selectare suma totala a produsele din cos
$sql = "select sum(pret_produs) total from produse where id_produs in (select id_produs from cos where id_utilizator = $w );";
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
    $_SESSION['total_din_cos'] = $row['total'];     
}


//verificare daca a fost apasat un buton de stergere din cos si stergerea din cos a produsului respectiv
for($i=0;$i<$_SESSION['numar_produse_din_cos'];$i++)
{
    if (isset($_POST['buton_sterge_produs_cos'][$i] ))
    {
        require 'dbh.inc.php';
        $z=(int)$_SESSION['id_produs_din_cos'][$i];
        $sql = "delete from cos where id_produs=$z and id_utilizator = $w;";        
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_query($conn, $sql);
    }
}

//verificare daca a fost apasat butonul de CUMPARA
if (isset($_POST['cumpara'] ))
{
    require 'dbh.inc.php';
    $w=(int)$_SESSION['utilizator_id'];
    $t= $_SESSION['total_din_cos'];
    require 'dbh.inc.php';
    $sql = "INSERT into comenzi (data_comanda,id_utilizator) VALUES (SYSDATE(), $w);";
    mysqli_query($conn, $sql); 
    //inserare in COMENZI produsele din COS
    for($j=0;$j<$_SESSION['numar_produse_din_cos'];$j++)
    {     
        $y=(int)$_SESSION['id_produs_din_cos'][$j];
        $sql = "INSERT into produse_din_comanda (id_comanda,id_produs) values( (select max(id_comanda) max from comenzi where id_utilizator=$w), $y);";
        mysqli_query($conn, $sql);
    }
    //stergere produse din COS
    $sql = "delete from cos where id_utilizator= $w;";
    mysqli_query($conn, $sql);
}

//actualizare produse din cos
require 'dbh.inc.php';
$sql = "SELECT produse.id_produs, produse.nume_produs, produse.pret_produs, produse.imagine_produs FROM cos, produse where cos.id_utilizator=$w and cos.id_produs=produse.id_produs;";
$result = mysqli_query($conn, $sql);
$_SESSION['numar_produse_din_cos']=mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0)
{
    for($j=0;$j<$_SESSION['numar_produse_din_cos'];$j++)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_produs_din_cos'][$j] = $row['id_produs'];
        $_SESSION['nume_produs_din_cos'][$j] = $row['nume_produs'];
        $_SESSION['valoare_produs_din_cos'][$j] = $row['pret_produs'];
        $_SESSION['imagine_produs_din_cos'][$j] = $row['imagine_produs'];
    }      
}

//actualizare suma totala a produselor din cos
$sql = "select sum(pret_produs) total from produse where id_produs in (select id_produs from cos where id_utilizator = $w );";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
    $_SESSION['total_din_cos'] = $row['total'];     
}

header("Location: ../cos.php");
exit(); 

?>