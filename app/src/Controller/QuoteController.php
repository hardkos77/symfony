<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// docker exec -it nomContainer bash

class QuoteController extends AbstractController {

    #[Route('/quote', name: 'index')]
    public function index(QuoteRepository $quoteRepository): Response {
        return $this->render(
            'quote/index.html.twig',
            [
                'quotes' => $quoteRepository->findAll(),
            ]
        );
    }
       // $url = $this->generateUrl('index', ['name' => 'Messi'], UrlGeneratorInterface::ABSOLUTE_URL);
        //return $this->redirectToRoute('test_test', ['name' => 'Messi']);
        //render(
          //  'quote/index.html.twig',
            //[
              //  'quotes' => $quoteRepository->findAll(),
            //]
        //);

    //#[Route('/new', name: 'newPage')]
    //public function newPage(
      //  QuoteRepository $quoteRepository
    //)



}
