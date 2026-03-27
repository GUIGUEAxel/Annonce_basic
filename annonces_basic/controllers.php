<?php

class Controllers
{
    protected $data = null;

    function __construct()
    {
        $this->data = $data;
    }
    public function loginAction()
    {
        require 'view/login.php';
    }

    public function annoncesAction($login, $password)
    {
        if (isUser($login, $password)) {
            $annonces = getAllAnnonces();
        } else {
            $login = '';
        }

        require 'view/annonces.php';
    }

    public function postAction($id)
    {
        $post = getPost($id);
        require 'view/post.php';
    }
}