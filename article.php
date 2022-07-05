<?php
declare(strict_types=1);
require_once 'inc/functions.php';

$articleId = $_GET['article'];
if (!ctype_digit($articleId)){
    http_response_code(404);
    echo 'Article not found';
    exit();
}
$articleId = (int)$articleId;
$action = $_GET['action'] ?? null;

try{
    $article = getArticleById($articleId);
    if (null === $article){
        http_response_code(404);
        echo 'Article not found';
        exit();
    }

    $comments = getCommentsForPost($articleId);
//    Form action
    $commentErrors = [];
    if ($action == "add-comment"){
        $commentErrors = validate($_POST);
        if (empty($commentErrors)) {
            sendComment($_POST, $articleId);
            // Update page
            header("Location: article.php?article={$articleId}");
            exit;
        }
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
