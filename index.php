<?php
require_once 'inc/functions.php';
$pageTitle = 'Home';
$currentPage = 'home';
$articles = getArticles();
?>

<!DOCTYPE html>
<html lang="en">
<?php require 'inc/head.php' ?>
    <body>
        <?php require 'inc/header.php' ?>
        <main class="container">
            <?php foreach ($articles as $article){ ?>
                <?php require 'inc/article.php';?>
            <?php }?>
        </main>
        <?php require 'inc/footer.php'?>
    </body>
</html>