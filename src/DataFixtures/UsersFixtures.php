<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $user = new Users();
            $user->setEmail($faker->email)
                ->setFisrtname($faker->lastName)
                ->setLastname($faker->firstName)
                ->setRoles(['ROLE_USER'])
                ->setPassword($this->passwordEncoder->hashPassword($user, 'password'));


            $manager->persist($user);

            $manager->flush();
        }
    }
}
