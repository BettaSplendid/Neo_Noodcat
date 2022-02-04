<?php

namespace App\Controller;

use Faker;
use App\Entity\Cat;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\Common\Collections\Expr\Value;


class CatController
{
    public static function index()
    {
        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Cat"));

        $Cat = $repo->findAll();

        if ($_SESSION['email']) {
            echo ("<br>email found, we consider you logged in<br>");
            var_dump($_POST);
            // include "./src/Views/cat_list.php";
        } else
            echo ("<br>no email found, you aren't logged in<br>");

        include "./src/Views/cat_home.php";
    }

    public static function displayAllcats()
    {
        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Cat"));
        $aCat = $repo->findAll();
        include "./src/Views/cat_list.php";
    }

    const NEEDS = [
        "nb_puce",
        "description",
        "numero_bar",
        "send"
    ];

    public static function showAddCat()
    {
        include './src/Views/cat_register.php';
    }


    public static function addCat()
    {
        echo ("Function add cat");
        var_dump($_POST);

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
                    echo "Il manque des champs à replir";
                    include("./src/Views/cat_register.php");
                    exit;
                }
            }
        }

        if ($_POST['description'] == "")
            $description = "Default description";
        else {
            $description = $_POST['description'];
        }

        try {
            $entityManager = Em::getEntityManager();
            $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Bar"));



            $bar = $repo->find((int)number_format($_POST['numero_bar']));
            var_dump($bar);

            $Cat = new Cat($_POST['nb_puce'], $description, $bar);
            $entityManager = Em::getEntityManager();
            $entityManager->persist($Cat);
            $entityManager->flush();
            header('Location: http://localhost/NoodCat');
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header( "refresh:5;url=/cats_add"); 
        }
    }

    public function AddRandomCat()
    {
        $faker = Faker\Factory::create();
        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Bar"));

        $lapin = $repo->findAll();
        $lievre = count($lapin);

        $bar = $repo->find(rand(1, $lievre));
        $Catto = new Cat(rand(), $faker->colorName, $bar);
        $entityManager->persist($Catto);
        try {
            $entityManager->flush();
            header('Location: http://NoodCat/cats');
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header( "refresh:5;url=/cats"); 
        }
    }
}
