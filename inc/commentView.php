<?php
/**
* @var array $comment
*/
?>

<div class="comment-block">
    <div class="comment-head">
        <span class="comment-author"><?=$comment['author']?></span>
        <span class="comment-rate">Rate <?=$comment['rate']?></span>
        <span class="comment-created"> <time datetime="<?=$comment['created']?>"><?=$comment['created']?></time></span>
    </div>
    <p><?=$comment['content']?></p>
</div>
