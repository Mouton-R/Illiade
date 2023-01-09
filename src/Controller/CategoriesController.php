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
        $page = $request->query->getInt('page', 1);

        $movies = $moviesRepository->findMoviesPaginated($page, $category->getSlug(), 4);

        return $this->render('categories/list.html.twig', compact('category', 'movies'));
    }
}
