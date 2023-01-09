<?php

namespace App\Controller;

use App\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'movies_')]
    public function index(): Response
    {
        return $this->render('movies/index.html.twig', [
            'controller_name' => 'MoviesController',
        ]);
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Movies $movies): Response
    {
        return $this->render('movies/index.html.twig', compact('movie'));
    }
}
