<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Products;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class ProductFixtures extends Fixture
{
    
    public function __construct(private SluggerInterface $slugger){}
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($prod =1; $prod <=10;$prod++){
            $Product = new Products();
            $Product ->setName($faker->text(15));
            $Product ->setDescription($faker->text());
            $Product ->setSlug($this->slugger->slug($Product->getName())->lower());
            $Product ->setPrice($faker->numberbetween(900, 150000));
            $Product ->setStock($faker->numberbetween(0, 10));
            $Category =$this -> getReference('cat-'.rand(1,8));
            $Product ->setCategories($Category);
            $this -> setReference('prod-'.$prod,$Product);
            $manager ->persist($Product);
        };
        $manager->flush();
    }
}