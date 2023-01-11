<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($cont = 0; $cont < 3; $cont++) {
            $contact = new Contact();
            $contact->setEmail($faker->email)
                ->setFisrtname($faker->lastName)
                ->setLastname($faker->firstName)
                ->setSubject($faker->word(4))
                ->setMessage($faker->paragraph(3));
            $manager->persist($contact);

            $manager->flush();
        }
    }
}
