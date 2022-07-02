<?php

function getDbConnection(){
    $dbhost = 'localhost';
    $dbname = 'website';
    $username = 'root';
    $passwd = 'root';
    return $db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $passwd);
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