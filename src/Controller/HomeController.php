<?php

namespace App\Controller;

use App\Entity\Movies;
use App\Entity\Categories;
use App\Repository\MoviesRepository;
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
    /*     #[Route("/movies/long", name: "movies_long")]
    public function long()
    {
        return $this->render('movies/long.html.twig');
    }
    #[Route("/movies/court", name: "movies_court")]
    public function court()
    {
        return $this->render('movies/court.html.twig');
    }
    #[Route("/movies/developpement", name: "movies_developpement")]
    public function developpement()
    {
        return $this->render('movies/developpement.html.twig');
    } */
    #[Route("/blog/info", name: "blog_info")]
    public function info()
    {
        return $this->render('blog/info.html.twig');
    }
    #[Route("/blog/contact", name: "blog_contact")]
    public function contact()
    {
        return $this->render('blog/contact.html.twig');
    }
    #[Route("/blog/{id}", name: "blog_show")]
    public function show(Movies $movies)
    {
        return $this->render('blog/show.html.twig', [
            'movies' => $movies
        ]);
    }
}
