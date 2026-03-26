<?php
    $link = mysqli_connect('mysql-basic.alwaysdata.net', 'basic_annonces', '8DRhjvsdZZ2V8CG', 'basic_annonces_db');
    
    $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$_GET['id'] );
    $post = mysqli_fetch_assoc($result);
require 'view/post.php';
?>

