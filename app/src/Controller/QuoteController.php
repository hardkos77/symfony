<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuoteController extends AbstractController {

    #[Route('/', name: 'index')]
    public function index(
        QuoteRepository $quoteRepository
    )
    : Response {

        return $this->render(
            'quote/index.html.twig',
            [
                'quotes' => $quoteRepository->findAll(),
            ]
        );
    }
    #[Route('/new', name: 'newPage')]
    public function newPage(
        QuoteRepository $quoteRepository
    )
    : Response {

        return $this->render(
            'quote/new.html.twig',
            [
                'quotes' => $quoteRepository->findAll(),
            ]
        );
    }
}
