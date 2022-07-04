<?php

function getDbConnection(){
    $dbhost = 'localhost';
    $dbname = 'websitelab';
    $username = 'root';
    $passwd = 'root';
    return $db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $passwd);
}

function getCommentsForPost(int $id): array{
    return getDbConnection()->query("SELECT * FROM comments WHERE post_id = $id")->fetchAll(PDO::FETCH_ASSOC); // На всякий случай
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
            substr($v, 0, $data[$k]['maxvalue']);
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}

function validate($data): string
{
    $errors = '';
    foreach ($data as $k => $v){
       if ($data[$k]['required'] && empty($data[$k]['value'])){
            $errors .= "<li>Field {$data[$k]['fieldName']} is not filled</li>";
       }
    }
    return $errors;
}

