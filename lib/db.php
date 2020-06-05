<?php

try{
    $db = new PDO("mysql:hostname=localhost;dbname=db_sepet;charset=utf8", "root", "");
} catch (PDOException $e){
    echo $e->getMessage();
}

?>


