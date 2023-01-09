<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr-FR');

        for ($img = 1; $img <= 60; $img++) {
            $image = new Images();
            $image->setName("http://placeholder.pics/svg/300x300/888888/EEE/Poster_Production_$img");
            $movie = $this->getReference('mov-' . rand(1, 24));
            $image->setMovies($movie);

            // $product = new Product();
            $manager->persist($image);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MoviesFixtures::class
        ];
    }
}
