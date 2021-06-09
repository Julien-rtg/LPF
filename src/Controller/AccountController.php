<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccountController extends AbstractController{
    
    /**
     * @Route ("/account", name = "account")
     */
    public function account(){
        return $this->render(
            'users/account.html.twig'
        );
    }
}