<?php
declare(strict_types=1);
require_once 'inc/functions.php';

$currentPage = 'home';

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

//    Form action
	$isAjax = 'xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
    $commentErrors = [];
    if ($action == "add-comment"){
        $commentErrors = validate($_POST);
        if (count($commentErrors) === 0) {
			sendComment($_POST, $articleId);
            if (!$isAjax) {
				header("Location: article.php?article={$articleId}");
			} else {
				$comments = getCommentsForPost($articleId);
				$commentsList = renderElement('commentsList', compact('comments'));
				echo json_encode(['success'=>true, 'commentsList'=>$commentsList]);
			}
            exit;
        } elseif ($isAjax) {
			$commentsForm = renderElement('comment', compact('articleId', 'commentErrors'));

			echo json_encode(['success'=>false, 'form'=>$commentsForm]);
			exit;
		}
    }
	$comments = getCommentsForPost($articleId);

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
	<?= renderElement('comment', compact('articleId', 'commentErrors')); ?>
	<?= renderElement('commentsList', compact('comments')); ?>
</main>
<?php require 'inc/footer.php'?>
</body>
</html>
