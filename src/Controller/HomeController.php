<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class Home extends AbstractController {

    /**
     * @Route("/", name="homepage")
     */
    public function home(){
        return new Response("Aha");
    }
}

?>