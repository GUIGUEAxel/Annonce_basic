<?php

class Controllers
{
    protected $data = null;

    function __construct($data)
    {
        $this->data = $data;
    }
    public function loginAction()
    {
        require 'view/login.php';
    }

    public function annoncesAction($login, $password)
    {
        if ($this->data->isUser($login, $password)) {
            $annonces = $this->data->getAllAnnonces();
        } else {
            $login = '';
            $annonces = [];
        }

        require 'view/annonces.php';
    }

    public function postAction($id)
    {
        $post = $this->data->getPost($id);
        require 'view/post.php';
    }
}