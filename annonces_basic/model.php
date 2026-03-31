<?php

class Model
{
    protected $dbh = null;

    public function __construct()
    {
        try {
            $this->dbh = new PDO(
                'mysql:host=mysql-basic.alwaysdata.net;dbname=basic_annonces_db',
                'basic_annonces',
                'annonces'
            );
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function isUser($login, $password)
    {
        $query = 'SELECT login FROM Users WHERE login = :login AND password = :password';
        $stmt = $this->dbh->prepare($query);
        $stmt->execute([
            'login' => $login,
            'password' => $password
        ]);

        return $stmt->rowCount() > 0;
    }

    public function getAllAnnonces()
    {
        $stmt = $this->dbh->query('SELECT id, title FROM Post');

        $annonces = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $annonces[] = $row;
        }

        return $annonces;
    }

    public function getPost($id)
    {
        $query = 'SELECT * FROM Post WHERE id = :id';
        $stmt = $this->dbh->prepare($query);
        $stmt->execute(['id' => intval($id)]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}