<!DOCTYPE html>
<html lang="en">

<?php include 'src/Include/head.php'; ?>

<body>
    <?php include 'src/Include/header.php'; ?>
    <div class="mainbody">
        <div class="mainbody_primary">

            <div class="container">


                <h1>Liste des bars</h1>
                <table class="table table-primary table-bordered">
                    <thead>
                        <th>Id:</th>
                        <th>Nom:</th>
                        <th>Adresse:</th>
                    </thead>
                    <?php

                    foreach ($aBar as $keybar) :
                        // var_dump($aBar); 
                    ?>

                        <tr>
                            <td class="col"> <?= $keybar->getBar_id() ?> </td>
                            <td class="col"> <?= $keybar->getName() ?> </td>
                            <td class="col"> <?= $keybar->getAdress() ?> </td>
                        </tr>



                    <?php endforeach ?>
                </table>
            </div>


        </div>
    </div>
    <?php include 'src/Include/footer.php'; ?>
</body>

</html>