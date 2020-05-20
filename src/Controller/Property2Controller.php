<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Property2Controller extends AbstractController{

    /**
     * @Route("/mauvais",name="property2.index")
     * @return Response
     */
    public function index() : Response
        {
            return $this->render('property/index2.html.twig',[

            ]);
        }
}