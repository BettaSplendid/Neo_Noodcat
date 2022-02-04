<!DOCTYPE html>
<html lang="en">

<?php include 'src/Include/head.php'; ?>

<body>
    <?php include 'src/Include/header.php'; ?>

    <div class="mainbody">
        <div class="container">
            <h1>
                Cat page
            </h1>

            <nav class="nav flex-column">
                <a class="nav-link" href="/cats_list">Listes des chats</a>
                <a class="nav-link" href="/cats_add">Ajouter un nouveau chat</a>
                <a class="nav-link" href="/cat_add_random">Ajouter un nouveau chat random</a>
                <a class="nav-link disabled">Disabled</a>
            </nav>
        </div>
    </div>

    <?php include 'src/Include/footer.php'; ?>
</body>

</html>