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
            $image->setName("/images/illiade.svg");
            $movie = $this->getReference('mov-' . rand(1, 24));
            $image->setMovies($movie);

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
