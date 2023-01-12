<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\MoviesRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movies', name: 'movies_')]
class MoviesController extends AbstractController
{


    #[Route('/{slug}', name: 'details')]
    public function details(Movies $movie): Response
    {
        return $this->render('movies/details.html.twig', compact('movie'));
    }
}
