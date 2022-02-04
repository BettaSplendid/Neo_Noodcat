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
        var_dump($Cat);

        if ($_SESSION['email']) {
            echo ("<br>email found, we consider you logged in<br>");
            var_dump($_POST);
            // include "./src/Views/cat_list.php";
        } else
            echo ("<br>no email found, you aren't logged in<br>");

        include "./src/Views/cat_home.php";
    }

    public static function displayAllcats() {
        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Cat"));
        $aCat = $repo->findAll();
        include "./src/Views/cat_list.php";
    }

    const NEEDS = [
        "puce",
        "description",
        "bar"
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
                    echo "Il manque des champs à replir";
                    include("./src/Views/cat_register.php");
                    exit;
                }
                $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
            }
            // int $puceNum, string $description, Bar $adress, Bar $enseigne, string $statut)
        }

        if ($_POST['description'] == "")
            $description = "Default description";

        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Bar"));


        echo ("<br>a");
        $bar = $repo->find($_POST['numero_bar']);
        var_dump($bar);


        $Cat = new Cat($_POST['nb_puce'], $description, $bar);
        var_dump($Cat);
        $entityManager = Em::getEntityManager();
        $entityManager->persist($Cat);
        try {
            $entityManager->flush();
            header('Location: http://localhost/NoodCat');
        } catch (\Throwable $th) {
            echo $th->getMessage();
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
        }
    }
}
