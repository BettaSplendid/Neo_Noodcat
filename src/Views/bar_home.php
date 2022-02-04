<!DOCTYPE html>
<html lang="en">

<?php include 'src/Include/head.php'; ?>

<body>
    <?php include 'src/Include/header.php'; ?>
    <div class="mainbody">
        <div class="container">

            <h1>Bars</h1>
            <!-- <a href="/showbars">Listes des bars</a>
            <a href="/add_Bar">Ajouter un bar</a>
            <a href="/add_random_bar">Ajouter un bar random</a> -->

            <nav class="nav flex-column">
                <a class="nav-link" href="/showbars">Listes des bars</a>
                <a class="nav-link" href="/add_Bar">Ajouter un bar</a>
                <a class="nav-link" href="/add_random_bar">Ajouter un bar random</a>
                <a class="nav-link disabled">Disabled</a>
            </nav>
        </div>
    </div>
    <?php include 'src/Include/footer.php'; ?>
</body>

</html>