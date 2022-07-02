<?php
require_once 'inc/functions.php';
$pageTitle = 'Home';
$currentPage = 'home';
try {
    $articles = getArticles();
} catch (Exception $exception){
    http_response_code(500);
    echo $exception->getMessage();
    exit();
}

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