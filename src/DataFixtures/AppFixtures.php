<?php

namespace App\DataFixtures;
use App\Entity\Categorie;
use App\Entity\Article;
use App\Entity\Commentaire;
use App\Entity\Media;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //création d'une variable qui va contenir faker
        $faker = Faker\Factory::create('fr_FR');
        //tableau qui va stocker les objets
        $tab=[];
        for ($i=0; $i <10 ; $i++) { 
            $cat = new Categorie();
            $cat->setNomCategorie($faker->jobTitle());
            $manager->persist($cat);
        }
        $manager->flush();
    }
}
