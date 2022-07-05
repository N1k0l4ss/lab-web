<?php
declare(strict_types=1);

function getDbConnection(){
    $dbhost = 'localhost';
    $dbname = 'websitelab';
    $username = 'root';
    $passwd = 'root';
    $db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $passwd);
    $db->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $db;
}

function getCommentsForPost(int $id): array{
    return getDbConnection()->query("SELECT * FROM comments WHERE post_id = $id ORDER BY created DESC")->fetchAll(PDO::FETCH_ASSOC); // На всякий случай
}

function getArticles(){
    return getDbConnection()->query("SELECT * FROM posts");
}

function getArticleById(int $id): ?array{
    $res = getDbConnection()->query("SELECT * FROM posts WHERE id = $id")->fetch();

    if ($res === false) {
        return null;
    }

    return $res;
}

function sendComment(array $data, int $id){
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO comments (post_id, rate, content, author, created) VALUES (?, ?, ?, ?, ?)";
    getDbConnection()->prepare($sql)->execute([$id, $data['rate'], $data['content'], $data['author'], $date]);

}



function validate(array $post): array
{
    $rules = [
        'author' => [
            'required' => true,
            'maxvalue' => 50,
        ],
        'rate' => [
            'required' => true,
            'maxvalue' => 5,
        ],
        'content' => [
            'required' => true,
            'maxvalue' => 200,
        ],
    ];

    $errors = [];
    foreach ($rules as $fieldName => $rule){
        $value = $post[$fieldName];
       if ($rule['required'] && empty($value)){
            $errors[$fieldName] = "This fieldName can't be empty";
       } elseif ($fieldName=="rate" && ($value > $rule['maxvalue'] || $value < 1)){
           $errors[$fieldName] = "This must be in range from 1 to {$rule['maxvalue']}";
       } elseif ($rule['maxvalue'] < mb_strlen($value)){
           $errors[$fieldName] = "This fieldName must contain length from 1 to {$rule['maxvalue']} of chars";
       }
    }
    return $errors;
}

