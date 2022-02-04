<?php

namespace App\Controller;

use App\Entity\Client;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\EntityRepository;
use App\Entity\User;
use \DateTime;

class UserController
{
    public function showregister()
    {
        include './src/Views/inscription.php';
    }

    const NEEDS = [
        "firstname",
        "lastname",
        "email",
        "password",
        "identityCard"
    ];

    public function register()
    {
        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    echo "Il manque des champs à replir";
                    include("./src/Views/inscription.php");
                    exit;
                }
                $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
            }


            $d =  new DateTime();
            $user = new Client($_POST["firstname"], $_POST["lastname"], $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT), $d, $_POST["identityCard"]);

            $entityManager = Em::getEntityManager();
            $entityManager->persist($user);
            try {
                $entityManager->flush();
                header('Location: http://NoodCat');
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }
    }

    public function showLogin()
    {
        include("./src/Views/connexion.php");
    }

    const LOG = [
        "email",
        "password"
    ];

    public function login()
    {
        if (empty($_POST)) {
            include("./src/Views/connexion.php");
        }

        if (!empty($_POST)) {
            foreach (self::LOG as $value) {
                if (!array_key_exists($value, $_POST)) {
                    echo "Email ou mot de passe incorrect";
                    die();
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                if ($_POST[$value] === "") {
                    echo "Format incorrect";
                    die();
                }
            }

            $entityManager = Em::getEntityManager();
            $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\User"));

            $user = $repo->findBy(['email' => $_POST['email']]);

            if (empty($user)) {
                echo "Cet utilisateur n'existe pas";
                die();
            }

            if (password_verify($_POST['password'], $user[0]->getPassword()) === false) {
                echo "Mot de passe incorrect";
                die();
            }

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['firstname'] = $user[0]->getFirstname();
            $_SESSION['type'] = strtolower(str_replace("App\Entity\\", "", get_class($user[0])));

            echo("test");
            // include("./src/Views/home.php");

        }
    }
}
