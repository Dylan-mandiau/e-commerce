<?php

namespace App\Controller;

use App\Repository\ProductsRepository;
use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/shop',name:'shop_')]
class ShopController extends AbstractController
{
     private $entityManager;

     /**
      * ProductController constructor.
      * @param EntityManagerInterface $entityManager
      */
     public function __construct(EntityManagerInterface $entityManager)
     {
         $this->entityManager = $entityManager;
     }


    #[Route('/',name:'index')]
    public function index(ProductsRepository $Product):Response
    {
        $product = $this->entityManager->getRepository(Products::class)->findAll();

        return $this->render('Shop/index.html.twig',[
        'product' => $product,
        ]);
        

    }



    #[Route('/{slug}',name:'details')]
    public function details(Products $Product):Response
    {
        return $this->render('Shop/details.html.twig',  [
            'product' => $Product
        ]);
    }
}