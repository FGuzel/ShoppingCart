<?php
include "db.php";
session_start();

function sepeteEkle($urun_adet){

    if(isset($_SESSION["sepet"])){
        $sepet = $_SESSION["sepet"];
        $urunler = $sepet["urunler"];
    } else {
        $urunler = array();
    }

    //Adet Kontrolü
    if(array_key_exists($urun_adet->urun_id, $urunler)){
        $urunler[$urun_adet->urun_id]->count++;
    }else{
        $urunler[$urun_adet->urun_id] = $urun_adet;
    }

    //Sepetin Hesaplanması
    $toplam_ucret = 0.0;
    $toplam_count = 0;

    foreach ($urunler as $urun){
        $urun->toplam_ucret = $urun->count * $urun->urun_fiyat;
        $toplam_ucret = $toplam_ucret + $urun->toplam_ucret;
        $toplam_count += $urun->count;
    }

    $summary["toplam_ucret"] = $toplam_ucret;
    $summary["toplam_count"] = $toplam_count;

    $_SESSION["sepet"]["urunler"] = $urunler;
    $_SESSION["sepet"]["summary"] = $summary;

    return $toplam_count;
}

function sepettenCikar($urun_id){

    if(isset($_SESSION["sepet"])){
        $sepet = $_SESSION["sepet"];
        $urunler = $sepet["urunler"];

        //Ürünü listeden Çıkarma
        if(array_key_exists($urun_id, $urunler)){
            unset($urunler[$urun_id]);
        }

        //Tekrardan sepeti hesapla
        $toplam_ucret = 0.0;
        $toplam_count = 0;

        foreach ($urunler as $urun){
            $urun->toplam_ucret = $urun->count * $urun->urun_fiyat;
            $toplam_ucret = $toplam_ucret + $urun->toplam_ucret;
            $toplam_count += $urun->count;
        }

        $summary["toplam_ucret"] = $toplam_ucret;
        $summary["toplam_count"] = $toplam_count;

        $_SESSION["sepet"]["urunler"] = $urunler;
        $_SESSION["sepet"]["summary"] = $summary;

        return true;
    }
}

function sayiArtir($urun_id){
    if(isset($_SESSION["sepet"])){
        $sepet = $_SESSION["sepet"];
        $urunler = $sepet["urunler"];

        //Adet Kontrolü
        if(array_key_exists($urun_id, $urunler)){
            $urunler[$urun_id]->count++;
        }

        //Sepetin Hesaplanması
        $toplam_ucret = 0.0;
        $toplam_count = 0;

        foreach ($urunler as $urun){
            $urun->toplam_ucret = $urun->count * $urun->urun_fiyat;
            $toplam_ucret = $toplam_ucret + $urun->toplam_ucret;
            $toplam_count += $urun->count;
        }

        $summary["toplam_ucret"] = $toplam_ucret;
        $summary["toplam_count"] = $toplam_count;

        $_SESSION["sepet"]["urunler"] = $urunler;
        $_SESSION["sepet"]["summary"] = $summary;
    }

    return true;

}

function sayiAzalt($urun_id){
    if(isset($_SESSION["sepet"])){
        $sepet = $_SESSION["sepet"];
        $urunler = $sepet["urunler"];

        //Adet Kontrolü
        if(array_key_exists($urun_id, $urunler)) {
            if ($urunler[$urun_id]->count <= 1) {
                unset($urunler[$urun_id]);
            } else {
                $urunler[$urun_id]->count--;
            }
        }

        //Sepetin Hesaplanması
        $toplam_ucret = 0.0;
        $toplam_count = 0;

        foreach ($urunler as $urun){
            $urun->toplam_ucret = $urun->count * $urun->urun_fiyat;
            $toplam_ucret = $toplam_ucret + $urun->toplam_ucret;
            $toplam_count += $urun->count;
        }

        $summary["toplam_ucret"] = $toplam_ucret;
        $summary["toplam_count"] = $toplam_count;

        $_SESSION["sepet"]["urunler"] = $urunler;
        $_SESSION["sepet"]["summary"] = $summary;
    }

    return true;
}

if(isset($_POST["p"])){
    $islem = $_POST["p"];

    if($islem == "sepeteEkle"){
        $id = $_POST["urun_id"];

        $urun = $db->query("SELECT * FROM urunler WHERE urun_id={$id}", PDO::FETCH_OBJ)->fetch();
        $urun->count = 1;

        echo sepeteEkle($urun);

    }else if($islem == "sepettenCikar"){
        $id = $_POST["urun_id"];

        echo sepettenCikar($id);


    }
}

if(isset($_GET["p"])){
    $islem = $_GET["p"];

    if($islem == "sayiArtir"){
        $id = $_GET["id"];

        if(sayiArtir($id)){
            header("Location:../sepet.php");
        }

    }else if($islem == "sayiAzalt"){
        $id = $_GET["id"];

        if(sayiAzalt($id)){
            header("Location:../sepet.php");
        }
    }
}

?>
