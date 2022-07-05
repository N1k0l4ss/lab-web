<?php

function getEmptyFields(){
    return [
        'author' => [
            'fieldName' => 'Author',
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
