<?php

namespace App\Controller;

require_once 'vendor/autoload.php';

use Faker;
use App\Entity\Bar;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Helpers\EntityManagerHelper as Em;


class BarController
{

    public static function index()
    {
        include "./src/Views/bar_home.php";
    }

    public static function displayAllBars()
    {


        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Bar"));
        $aBar = $repo->findAll();
        include "./src/Views/bar_list.php";
    }

    const NEEDS = [
        "bar_adress",
        "nom"
    ];

    public static function showAddBar()
    {
        include './src/Views/bar_creation.php';
    }
    public static function addBar()
    {
        echo ("<br>Add bar()<br>");
        var_dump($_POST);

        if (empty($_POST)) {
            echo ("empty issue");
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    echo "Il manque des champs à remplir";
                    include("./src/Views/bar_creation.php");
                    exit;
                }
            }
        }

        $_POST[$value] = htmlentities(strip_tags($_POST[$value]));

        echo ("<br>Creating bar<br>");

        $Bar = new Bar($_POST["bar_adress"], $_POST["bar_name"]);

        echo ("bar created");
        $entityManager = Em::getEntityManager();
        $entityManager->persist($Bar);

        try {
            $entityManager->flush();
            // header('Location: "./src/Views/bar_list.php"');
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header( "refresh:5;url=/bar"); 
        }
    }

    public function AddRandomBar()
    {
        $faker = Faker\Factory::create();
        $entityManager = Em::getEntityManager();
        $Bar = new Bar($faker->address, $faker->company);
        $entityManager->persist($Bar);
        try {
            $entityManager->flush();
            header('Location: http://NoodCat/showbars');
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header( "refresh:5;url=/bar"); 
        }
    }
}
