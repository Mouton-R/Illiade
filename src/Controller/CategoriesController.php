<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\MoviesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
    #[Route('/{slug}', name: 'list')]
    public function list(Categories $category, MoviesRepository $moviesRepository, Request $request): Response
    {
        //on va chercher le numéro de page dans l'url
        $page = $request->query->getInt('page', 1);

        // on va chercher la liste des films de la catégorie
        $movies = $moviesRepository->findMoviesPaginated($page, $category->getSlug(), 15);

        return $this->render('categories/list.html.twig', compact('category', 'movies'));
    }

    #[Route("/court-metrages", name: "court-metrages")]
    public function court()
    {
        return $this->render('categories/court-metrages.html.twig');
    }

    #[Route("/long-metrages", name: "long-metrages")]
    public function long()
    {
        return $this->render('categories/long-metrages.html.twig');
    }

    #[Route("/en-developpement", name: "en-developpement")]
    public function developpement()
    {
        return $this->render('categories/en-developpement.html.twig');
    }
}
