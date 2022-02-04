<!DOCTYPE html>
<html lang="en">

<?php include 'src/Include/head.php'; ?>

<body>
    <?php include 'src/Include/header.php'; ?>
    <div class="container">

        <div class="mb-3 border border-4 px-4 g-2">
            <form method="post">
                <h1>Formulaire Inscription</h1>
                <div class="input-group mb-3">
                    <span class="input-group-text">NUMERO DE PUCE:</span>
                    <input type="number" name="nb_puce" placeholder="puce" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Description</span>
                    <input type="text" name="description" value="test" placeholder="description">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="number" name="numero_bar" placeholder="Bar number : 789789" required>
                </div>
                <input type="submit" name="send" value="envoyer">
            </form>
        </div>
    </div>
    <?php include 'src/Include/footer.php'; ?>
</body>

</html>