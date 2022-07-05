<?php
require_once 'inc/functions.php';
require_once 'inc/commentData.php';

$articleId = $_GET['article'];

$fields = getEmptyFields();
try{
    $article = getArticleById($articleId);
    if (null === $article){
        http_response_code(404);
        echo 'Article not found';
        exit();
    }
    $comments = getCommentsForPost($articleId);
//    Form action
    $fields = fill($fields);
    $validateInfo = validate($fields);
    if (empty($validateInfo)){
        sendComment($fields, $article['id']);
        // Update page
        header("Location: article.php?article=$articleId");
        exit;
    }

} catch (Exception $exception){
    http_response_code(500);
    echo $exception->getMessage();
    exit();
}

$pageTitle = $article['title'];
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
    <?php require 'inc/comment.php'?>
    <?php foreach ($comments as $comment){ ?>
        <?php  require 'inc/commentView.php'; ?>
    <?php } ?>
</main>
<?php require 'inc/footer.php'?>
</body>
</html>
