<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BootswatchController extends AbstractController
{
    #[Route('/bootswatch', name: 'bootswatch')]
    public function index(): Response
    {
        return $this->render('bootswatch/index.html.twig', [
            'controller_name' => 'BootswatchController',
        ]);
    }
}
