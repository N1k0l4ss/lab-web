<?php

/** @var int $articleId */

//add-comment
// article.php?article=

?>


<div class="comment-make">
    <form method="post" action="article.php?article=<?=$articleId?>&action=add-comment">
        <div class="input">
            <label for="author">Author</label>
            <input name="author" id="author" type="text" placeholder="You name" value="<?=htmlspecialchars($_POST['author']) ?? null?>">
            <?php if (isset($commentErrors['author'])){ ?>
                <div class="error"><?=$commentErrors['author']?></div>
            <?php } ?>
        </div>

        <div class="input">
            <label for="rate">Rate</label>
            <select name="rate" id="rate">
                <?php for($i = 5; $i > 0; $i--) {?>
                    <option value="<?=$i; ?>"<?= $i===(int)$_POST['rate']??null ? ' selected ="selected"':'';  ?>>Rate <?= $i;  ?></option>
                <?php } ?>
            </select>
            <?php if (isset($commentErrors['rate'])){ ?>
                <br><div class="error" ><?=$commentErrors['rate']?></div>
            <?php } ?>
        </div>

        <div class="input">
            <label for="content">Comment</label>
            <textarea name="content" id="content" placeholder="Comment"><?=htmlspecialchars($_POST['content']) ?? null?></textarea>
            <?php if (isset($commentErrors['content'])){ ?>
                <div class="error"><?=$commentErrors['content']?></div><br>
            <?php } ?>
        </div>

        <div class="submit">
            <button type="submit" class="button">Send</button>
        </div>
    </form>
</div>