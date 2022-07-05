<?php

function getDbConnection(){
    $dbhost = 'localhost';
    $dbname = 'websitelab';
    $username = 'root';
    $passwd = 'root';
    return $db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $passwd);
}

function getCommentsForPost(int $id): array{
    return getDbConnection()->query("SELECT * FROM comments WHERE post_id = $id ORDER BY created DESC")->fetchAll(PDO::FETCH_ASSOC); // На всякий случай
}

function getArticles(){
    return getDbConnection()->query("SELECT * FROM posts");
}

function getArticleById(int $id): ?array{
    $res = getDbConnection()->query("SELECT * FROM posts WHERE id = $id")->fetch();
    if (empty($res)) {
        return null;
    } else return $res;
}

function sendComment(array $data, int $id){
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO comments (post_id, rate, content, author, created) VALUES (?, ?, ?, ?, ?)";
    getDbConnection()->prepare($sql)->execute([$id, $data['rate']['value'], $data['content']['value'], $data['author']['value'], $date]);

}

function fill($data): array
{
    foreach ($_POST as $k => $v){
        if (array_key_exists($k, $data)){
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}

function validate($data): string
{
    $errors = '';
    foreach ($data as $k => $v){
       if ($v['required'] && empty($v['value'])){
            $errors .= "<li class='error'>{$v['fieldName']} field can't be empty</li>";
       }
       if ($v['fieldName']=="Rate" && ($v['value'] > 5 || $v['value'] < 1)){
           $errors .= "<li class='error'>{$v['fieldName']} must be in range from 1 to {$v['maxvalue']}</li>";
       } else if ($v['maxvalue'] < strlen($v['value'])){
           $errors .= "<li class='error'>{$v['fieldName']} field must contain lenght from 1 to {$v['maxvalue']} of chars</li>";
       }
    }
    return $errors;
}

