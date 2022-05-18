<?php

namespace App\Controller;

use App\Entity\ProductEntity;
use App\Form\ProductEntityType;
use App\Repository\ProductEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product/entity')]
class ProductEntityController extends AbstractController
{
    #[Route('/', name: 'app_product_entity_index', methods: ['GET'])]
    public function index(ProductEntityRepository $productEntityRepository): Response
    {
        return $this->render('product_entity/index.html.twig', [
            'product_entities' => $productEntityRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_product_entity_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProductEntityRepository $productEntityRepository): Response
    {
        $productEntity = new ProductEntity();
        $form = $this->createForm(ProductEntityType::class, $productEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productEntityRepository->add($productEntity);
            return $this->redirectToRoute('app_product_entity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product_entity/new.html.twig', [
            'product_entity' => $productEntity,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_product_entity_show', methods: ['GET'])]
    public function show(ProductEntity $productEntity): Response
    {
        return $this->render('product_entity/show.html.twig', [
            'product_entity' => $productEntity,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_product_entity_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProductEntity $productEntity, ProductEntityRepository $productEntityRepository): Response
    {
        $form = $this->createForm(ProductEntityType::class, $productEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productEntityRepository->add($productEntity);
            return $this->redirectToRoute('app_product_entity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product_entity/edit.html.twig', [
            'product_entity' => $productEntity,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_product_entity_delete', methods: ['POST'])]
    public function delete(Request $request, ProductEntity $productEntity, ProductEntityRepository $productEntityRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productEntity->getId(), $request->request->get('_token'))) {
            $productEntityRepository->remove($productEntity);
        }

        return $this->redirectToRoute('app_product_entity_index', [], Response::HTTP_SEE_OTHER);
    }
}
