<?php


function openConnection()
{
    try {
        $dbh = new PDO('mysql:host=mysql-basic.alwaysdata.net;dbname=basic_annonces_db', 'basic_annonces', 'annonces');
    } catch (PDOException $e) {
        print "Erreur de connexion !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $dbh;
}

function closeConnection($link)
{
    $dbh = null;
}

function isUser( $login, $password )
{
    $isuser = False ;
    $dbh = openConnection();

    $query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
    $result = $dbh->query( $query);

    if( $result->rowCount() )
        $isuser = True;

    $result->closeCursor();
    closeConnection($dbh);

    return $isuser;
}

function getAllAnnonces()
{
    $dbh = openConnection();

    $result = $dbh->query('SELECT id, title FROM Post');
    $annonces = array();

    while ($row = $result->fetch()) {
        $annonces[] = $row;
    }

    $result->closeCursor();
    closeConnection($dbh);

    return $annonces;
}

function getPost( $id )
{
    $dbh = openConnection();

    $id = intval($id);
    $result = $dbh->query( 'SELECT * FROM Post WHERE id='.$id );
    $post = $result->fetch();

    $result->closeCursor();
    closeConnection($dbh);
    return $post;
}