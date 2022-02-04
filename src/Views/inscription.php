<!DOCTYPE html>
<html lang="en">

<?php include 'src/Include/head.php'; ?>

<body>
    <?php include 'src/Include/header.php'; ?>
    <div class="mainbody">

        <div class="container">
            <div class="form_container">
                <form method="post" action="/register">
                    <h1>Formulaire Inscription</h1>
                    <div class="input-group mb-3">
                        <input type="text" name="firstname" placeholder="firstname" required>
                        <input type="text" name="lastname" placeholder="lastname" required>
                    </div>
                    <h2>Information compte</h2>
                    <div class="input-group mb-3">
                        <label for="email">Email :</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="Password">Mot de passe :</label>
                        <input type="password" name="password" required>
                    </div>
                    <h2>Carte identité</h2>
                    <div class="input-group mb-3">
                        <input type="test" name="identityCard" required>
                        <input type="submit" name="send" value="envoyer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'src/Include/footer.php'; ?>
</body>

</html>