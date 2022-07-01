<?php
require_once 'inc/functions.php';
$article = getArticleById($_GET['article']);
$pageTitle = $article['title'];

if (null === $article){
    http_response_code(404);
    echo 'Article not found';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require 'inc/head.php' ?>
<body>
<?php require 'inc/header.php' ?>
<main class="container" class="main-text">
    <?php
        require 'inc/article.php';
    ?>
</main>
<?php require 'inc/footer.php'?>
</body>
</html>
