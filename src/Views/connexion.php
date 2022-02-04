<!DOCTYPE html>
<html lang="en">

<?php include 'src/Include/head.php'; ?>

<body>
    <?php include 'src/Include/header.php'; ?>
    <div class="container">
        <form method="post" action="/login">
            <label for="email">Entrez votre email :</label>
            <input type="email" name="email">
            <label for="password">Entrer votre mot de passe :</label>
            <input type="password" name="password">
            <input type="submit" value="submit">
        </form>
        <div>Vous n'avez pas de compte client?
            <a href="/signin">Inscrivez-vous.</a>
        </div>
    </div>

    <?php include 'src/Include/footer.php'; ?>
</body>

</html>