<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\MoviesRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Request;
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

    // #[Route("/categories/court", name: "movies_court")]
    // public function court()
    // {
    //     return $this->render('categories/Court-metrages.html.twig');
    // }

    // #[Route("/movies/developpement", name: "movies_developpement")]
    // public function developpement()
    // {
    //     return $this->render('movies/developpement.html.twig');
    // }


    // #[Route('/categories/{slug}', name: "movies_long")]
    // public function long(Categories $category, MoviesRepository $moviesRepository, Request $request)
    // {
    //     dd($request);
    //     //on va chercher le numéro de page dans l'url
    //     $page = $request->query->getInt('page', 1);

    //     // on va chercher la liste des films de la catégorie
    //     $movies = $moviesRepository->findMoviesPaginated($page, $category->getSlug(), 3);

    //     return $this->render('movies/long.html.twig', compact('category'));
    // }

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
    // #[Route("/long", name: "long")]
    // public function long(!Movies $movie!, Categories $category, MoviesRepository $moviesRepository): response
    // {
    //     // on va chercher la liste des films de la catégorie
    //     $movies = $moviesRepository->findBy(
    //         ['category' => 'long-metrages']
    //     );

    //     return $this->render('movies/long.html.twig', compact('category', 'movies'));
    // }
}
