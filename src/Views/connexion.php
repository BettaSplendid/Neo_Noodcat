<!DOCTYPE html>
<html lang="en">

<?php include 'src/Include/head.php'; ?>

<body>
    <?php include 'src/Include/header.php'; ?>
    <div class="mainbody">
        <div class="form_container">
            <div class="container">
                <h1>Formulaire de connexion</h1>
                <form method="post" action="/login">
                    <div class="input-group mb-3">
                        <label for="email">Entrez votre email :</label>
                        <input type="email" name="email">
                    </div>
                    <div class="input-group mb-3">
                        <label for="password">Entrer votre mot de passe :</label>
                        <input type="password" name="password">
                    </div>
                    <input type="submit" value="submit">
                </form>
                <div>Vous n'avez pas de compte client?
                    <a href="/signin">Inscrivez-vous.</a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'src/Include/footer.php'; ?>
</body>

</html>