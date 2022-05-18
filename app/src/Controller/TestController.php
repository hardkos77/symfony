<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/test', name:'test_')]

class TestController extends AbstractController
{
    #[Route('/user/{name}', name: 'test', methods: ['GET', 'POST'])]
    public function index(string $name): Response
    {
       // $this->attack('Theo', nombreVie: 20.9);

        // 'first_name' => 'Hartmann'

        return $this->render('test/index.html.twig', [
            'name' => $name,
        ]);
    }
    //private function attack(string $perso = '', float $nombreVie){

    //}
    #[Route('/candidat/{num}',
        name: 'getNumberSo',
        requirements: [
            'getNumberSociale' => '\d+',
        ])]
    public function getNumber(int $num){
        // $number = random_int($min, $max);
        return $this->render('test/index.html.twig', [
            'num' => $num,
        ]);
    }
    #[Route('/alphabet', name: 'getNumberSo')]
    public function alphabet(): Response {
        $alphabet = range('A', 'Z');
        var_dump($alphabet);
        return $this->render('test/number.html.twig', [
            'letters' => $alphabet
        ]);
    }
}
