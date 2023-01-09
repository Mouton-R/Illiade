<?php

namespace App\Controller;

use App\Entity\Movies;
use App\Repository\MoviesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('blog/home.html.twig');
    }

    #[Route("/blog/long", name: "blog_long")]

    public function long(MoviesRepository $repo)
    {
        return $this->render('blog/long.html.twig');

        $productions = $repo->findAll();

        return $this->render(
            'blog/long.html.twig',
            [
                'controller_name' => 'BlogController',
                'productions' => $productions
            ]
        );
    }

    #[Route("/blog/court", name: "blog_court")]
    public function court()
    {
        return $this->render('blog/court.html.twig');
    }
    #[Route("/blog/developpement", name: "blog_developpement")]
    public function developpement()
    {
        return $this->render('blog/developpement.html.twig');
    }
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
