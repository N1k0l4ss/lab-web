<?php
$article =  ['id' => null,
    'category' => 'info',
    'image' => 'img/MyPhoto.jpg',
    'title' => 'About',
    'creator' => 'Nikita',
    'date' => '2022-06-20 08:36:00',
    'content' => "Hello, my name is Nikita. I am the creator of website. Now I'm studying in the National University of Shipbuilding by Admiral Makarov."
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