<?php
    $link = mysqli_connect('mysql-basic.alwaysdata.net', 'basic_annonces', 'annonces', 'basic_annonces_db');

    
    $query= 'SELECT login FROM users WHERE login="'.$_POST['login'].'" and password="'.$_POST['password'].'"';
    $resultlogin = mysqli_query($link, $query );
    
    if( mysqli_num_rows( $resultlogin) ){
        mysqli_free_result( $resultlogin );
        $login = $_POST['login'];
        $annonces = array();
        $resultall = mysqli_query($link, 'SELECT id, title FROM post');

        while ($row = mysqli_fetch_assoc($resultall)) {
            $annonces[] = $row;
        }
    }
    else{
        header( "refresh:5;url=index.php" );
        echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
        exit;
    }
    require 'view/annonces.php';

mysqli_close($link);
?>