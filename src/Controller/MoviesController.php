<?php

namespace App\Controller;

use App\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movies', name: 'movies_')]
class MoviesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('movies/index.html.twig', [
            'controller_name' => 'MoviesController',
        ]);
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Movies $movie): Response
    {
        return $this->render('movies/details.html.twig', compact('movie'));
    }
}
