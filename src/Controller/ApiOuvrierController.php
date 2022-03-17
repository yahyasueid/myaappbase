<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiOuvrierController extends AbstractController
{
    #[Route('/api/ouvrier', name: 'app_api_ouvrier')]
    public function index(): Response
    {
        return $this->render('api_ouvrier/index.html.twig', [
            'controller_name' => 'ApiOuvrierController',

        ]);
    }
}
