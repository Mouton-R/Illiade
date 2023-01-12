<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('blog/home.html.twig', [
            'categories' => $categoriesRepository->findBy(
                [],
                ['categoryOrder' => 'asc']
            )
        ]);
    }
    #[Route("/blog/info", name: "blog_info")]
    public function info()
    {
        return $this->render('blog/info.html.twig');
    }
}
