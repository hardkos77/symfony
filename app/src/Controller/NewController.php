<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends AbstractController
{
    #[Route('/exo', name: 'exo')]
    public function index(): Response
    {
        return $this->render('new/index.html.twig', [
            'controller_name' => 'NewController',
        ]);
    }
}
