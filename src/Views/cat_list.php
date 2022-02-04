<!DOCTYPE html>
<html lang="en">

<?php include 'src/Include/head.php'; ?>

<body>
    <?php include 'src/Include/header.php'; ?>
    <div class="mainbody">
        <div class="mainbody_primary">

            <div class="container">


                <h1>Liste des chats</h1>
                <table class="table table-primary table-bordered">
                    <thead>
                        <th>Id:</th>
                        <th>Nom:</th>
                        <th>Status:</th>
                    </thead>
                    <?php

                    foreach ($aCat as $keycat) :
                        // var_dump($aCat); 
                    ?>

                        <tr>
                            <td class="col"> <?= $keycat->getPuceNum() ?> </td>
                            <td class="col"> <?= $keycat->getDescription() ?> </td>
                            <td class="col"> <?= $keycat->getStatut() ?> </td>
                        </tr>



                    <?php endforeach ?>
                </table>
            </div>


        </div>
    </div>
    <?php include 'src/Include/footer.php'; ?>
</body>

</html>