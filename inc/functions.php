<?php
function getArticles(): array
{
    return [
        ['id' => 1,
        'category' => 'food',
        'image' => 'https://adelaidefoodcentral.files.wordpress.com/2017/11/a0115.jpg',
        'title' => 'Healthy salad',
        'creator' => 'Nikita',
        'date' => '2022-06-29 08:36:00',
        'content' => 'There is no substitute for a plate full of veggies dressed in something spectacular, and that\'s just what this salad offers.
        Motivated by the warm fall weather we\'ve been having, I decided to toss together a bunch of my favorite veggies and deck them out in a dressing
        that is as blissful as it is tasty.  With some brief chopping and processing, I had the above whipped up in just 20 minutes.  Better yet,
        I stored the leftover chopped ingredients in containers so that I could put this special salad together in the blink of an eye throughout the week.'],
        ['id' => 2,
        'image' => 'https://ychef.files.bbci.co.uk/1376x774/p07phq4b.jpg',
        'category' => 'sport',
        'title' => 'Sport in your life',
        'creator' => 'Nikita',
        'date' => '2022-06-29 15:15:00',
        "content" => "Sports have an immense impact on a person’s daily life and health. They do not just give you an interesting routine but also a healthy body.
        Getting indulged in physical activities like sports improves your heart function, reduces the risks of diabetes, controls blood sugar, and lowers
        tension and stress levels. It also brings positive energy, discipline, and other commendable qualities to your life. Playing sports strengthens
        your body and also improves your muscle memory and muscle coordination. Primary health care doctors recommend taking part in sports on a regular basis.
        There are countless benefits of sports; some of them are here for you."],
        ];
}

function getArticleById(int $id): ?array{
    foreach (getArticles() as $article){
        if ($article['id'] == $id) {
            return $article;
        }
    }
    return null;
}