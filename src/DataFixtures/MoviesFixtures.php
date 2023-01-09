<?php

namespace App\DataFixtures;

use App\Entity\Movies;
use Faker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;


class MoviesFixtures extends Fixture
{

    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');



        for ($mov = 0; $mov < 25; $mov++) {
            $movie = new Movies();
            $movie->setTitle($faker->word(3))
                ->setYearOfProduction($faker->year())
                ->setCountry($faker->word(1))
                ->setLanguage($faker->word(1))
                ->setKind($faker->word(1))
                ->setDirecting($faker->word(1))
                ->setDescription($faker->paragraph(5))
                ->setSlug($this->slugger->slug($movie->getTitle()));


            $category = $this->getReference('cat-' . rand(1, 3));
            $movie->setCategories($category);
            $this->setReference('mov-' . $mov, $movie);

            $manager->persist($movie);

            $manager->flush();
        }
    }
}
