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
        //tableau qui va stocker les objets Categorie
        $tabCat=[];
        //tableau qui va stocker les objets Article
        $tabArticle=[];
        
        //boucle pour ajouter des catégories
        for ($i=0; $i <10 ; $i++) { 
            $cat = new Categorie();
            $cat->setNomCategorie($faker->jobTitle());
            $tabCat[] = $cat;
            $manager->persist($cat);
        }
        //boucle pour ajouter des articles
        for ($i=0; $i <50 ; $i++) { 
            $article = new Article();
            $article->setTitreArticle($faker->word(2));
            $article->setContenuArticle($faker->text());
            $article->setDateArticle($faker->dateTime());
            $article->setValidationArticle($faker->boolean());
            //ajouter un objet Catégorie aléatoire depuis le tableau tabCat
            $article->addCategory($tabCat[$faker->numberBetween(0, 4)]);
            $article->addCategory($tabCat[$faker->numberBetween(5, 9)]);
            $tabArticle[] = $article;
            $manager->persist($article);
        }
        //boucle pour ajouter des commentaires
        for ($i=0; $i < 100; $i++) { 
            $com = new Commentaire();
            $com->setContenuCommentaire($faker->realText($maxNbChars = 200, $indexSize = 2));
            $com->setDateCommentaire($faker->dateTime());
            $com->setValidationCommentaire($faker->boolean());
            //ajouter un objet Article aléatoire depuis le tableau tabArt
            $com->setArticle($tabArticle[$faker->numberBetween(0, 49)]);
            $manager->persist($com);
        }
        //boucle pour ajouter des medias
        for ($i=0; $i < 100 ; $i++) { 
            $media = new Media();
            $media->setNomMedia($faker->word(1));
            $media->setUrlMedia($faker->imageUrl(640, 480, 'animals', true));
            //ajouter un objet Article aléatoire depuis le tableau tabArt
            $media->setArticle($tabArticle[$faker->numberBetween(0, 49)]);
            $manager->persist($media);
        }
        $manager->flush();
    }
}
