<?php

namespace App\Controller;

use App\Repository\ProductsRepository;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    //    Private $entityManager;
// /**
    // * ProductController constructer
    // * @param EntityManagerInterface  $entityManager
    //*/
//public function __construct(EntityManagerInterface  $entityManager){
//    $this->entityManager = $entityManager;
//}

    #[Route('/', name: 'app_home')]
    public function index(CategoriesRepository $categoriesRepository ,ProductsRepository $product ): Response
    {
        return $this->render('home/home.html.twig',[
            'categories' => $categoriesRepository->findBy([],['categoryOrder' =>'asc']),
            'product' => $product->findAll(),

        ]);
    }
}
