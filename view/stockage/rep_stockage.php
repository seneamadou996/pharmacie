<?php
    $liaison = mysqli_connect('127.0.0.1','root','');
    mysqli_select_db($liaison,'monpharmacie');
    if(isset($_POST["tempo"]) && $_POST["tempo"]=="recup" && isset($_POST["tempo1"]) && $_POST["tempo1"]=="recup" && isset($_POST["tempo2"]) && $_POST["tempo2"]=="recup")
    {
        $id_medic=$_POST['medicaments_id'];
        $id_com=$_POST['commandes_id'];
        $id_stock=$_POST['stocks_id'];
        $req="SELECT * FROM medicaments  WHERE id=$id_medic";
        $retours=mysqli_query($liaison,$req);
        $retour=mysqli_fetch_array($retours);
        $chaine=$retour["libelle"]."|".$retour["prix_achat"];
        print($chaine);
        $req1="SELECT * FROM commandes JOIN medicaments ON commandes.medicaments_id=$id_medic";
        $retours1=mysqli_query($liaison,$req1);
        $retour1=mysqli_fetch_array($retours1);
        $chaine1=$retour1["quantite"].")".$retour1["id"];
        print($chaine1);
        $req2="SELECT * FROM stocks  WHERE id=$id_stock";
        $retours2=mysqli_query($liaison,$req2);
        $retour2=mysqli_fetch_array($retours2);
        $chaine2=$retour2["libelle_stock"]."%".$retour2["quantite_max"];
        print($chaine2);
        $req3="SELECT * FROM stockagemedicaments  WHERE id=$id_medic";
        $retours3=mysqli_query($liaison,$req3);
        $retour3=mysqli_fetch_array($retours3);
        $chaine3=$retour3["quantite_stock"]."}".$retour3["id"];
        print($chaine3);

    }
    else
    {

    }
?>