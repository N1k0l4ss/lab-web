<?php
$article =  ['id' => null,
    'category' => null,
    'image' => 'https://adelaidefoodcentral.files.wordpress.com/2017/11/a0115.jpg',
    'title' => 'About',
    'creator' => 'Nikita',
    'date' => '2022-06-29 08:36:00',
    'content' => 'Content...........',
];

$pageTitle = $article['title'];
$currentPage = 'about';
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'inc/head.php' ?>
    <body>
    <?php require 'inc/header.php' ?>
    <main class="container">
        <?php require 'inc/article.php'?>
    </main>
    <?php require 'inc/footer.php'?>
    </body>
</html>