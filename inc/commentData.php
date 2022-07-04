<?php

function getEmptyFields(){
    return [
        'author' => [
            'fieldName' => 'author',
            'required' => 1,
            'maxvalue' => 50,
        ],
        'rate' => [
            'fieldName' => 'Rate',
            'required' => 1,
            'maxvalue' => 5,
        ],
        'content' => [
            'fieldName' => 'Comment',
            'required' => 1,
            'maxvalue' => 200,
        ],
    ];
}
