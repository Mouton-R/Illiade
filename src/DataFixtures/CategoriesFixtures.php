<?php

namespace App\DataFixtures;


use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{

    private $counter = 1;

    public function __construct(private SluggerInterface $slugger)
    {
    }


    public function load(ObjectManager $manager): void
    {
        $this->createCategroy('Long-métrages', $manager);
        $this->createCategroy('Court-métrages', $manager);
        $this->createCategroy('En développement', $manager);

        $manager->flush();
    }

    public function createCategroy(string $name, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name)
            ->setSlug($this->slugger->slug($category->getName()));
        $manager->persist($category);

        $this->addReference('cat-' . $this->counter, $category);
        $this->counter++;

        return $category;
    }
}
