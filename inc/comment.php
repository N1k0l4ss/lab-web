<?php

/** @var int $articleId */
require_once 'inc/commentData.php';

if (!empty($validateInfo) && !empty($_POST))
    echo "<div>$validateInfo</div>";
?>


<div class="comment-make">
    <form method="post">
        <input name="author" id="author" type="text" placeholder="You name">
        <label for="rate">Rate</label>
        <select name="rate" id="rate">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected>5</option>
        </select>
        <textarea name="content" id="content" placeholder="Comment"></textarea>
        <button type="submit" class="button">Send</button>
    </form>
</div>