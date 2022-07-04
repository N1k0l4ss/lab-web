<?php

/** @var int $articleId */

require_once 'inc/commentData.php';

$fields = getEmptyFields();

if (!empty($_POST)){
    $fields = fill($fields);
    $validateInfo = validate($fields);
    if (empty($validateInfo)){
        try {
            sendComment($fields, $articleId);
        } catch (Exception $exception){
            http_response_code(500);
            echo $exception->getMessage();
            exit();
        }
    }
    else {
        echo "<div>$validateInfo</div>";
    }
}
?>


<div class="comment-make">
    <form method="post" >
        <input name="author" id="author" type="text" placeholder="You name">
        <label for="rate">Mark</label>
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