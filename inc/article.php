<?php
    /**
     * @var array $article
     */
?>
<article class="site-article">
        <img src="<?= $article['image'] ?>" alt="image">
        <div>
            <header>
                <div class="article-category">In <span><?= $article['category'] ?></span></div>
                <h2 class="article-title"><a href="../article.php?article=<?= $article['id'] ?>"><?= $article['title'] ?></a></h2>
                <div class="article-creator"><?= $article['creator'] ?><time datetime="<?= $article['date'] ?>"> - <?= date('F j, Y', strtotime($article['date'])) ?></time></div>
            </header>
            <div>
                <p class="article-content"><?= $article["content"] ?></p>
            </div>
        </div>
    </article>
