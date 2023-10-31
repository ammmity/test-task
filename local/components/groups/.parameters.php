<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

// Параметры
$arComponentParameters = [
    'PARAMETERS' => [
        'LIST_TITLE'  =>  [
            'PARENT' => 'BASE',
            'NAME' => 'Заголовок списка',
            'DEFAULT' => 'Список групп'
        ],
        "CACHE_TIME" => [],
        'VARIABLE_ALIASES' => [
            'ID' => ['NAME' => 'Имя переменнрй ID элемента'],
        ],
        // ЧПУ
        'SEF_MODE' => [
            'list' => [
                'NAME' => 'Страница списка',
                'DEFAULT' => '',
                'VARIABLES' => [],
            ],
            'view' => [
                'NAME' => 'Детальная страница',
                'DEFAULT' => '#ID#/',
                'VARIABLES' => ['ID'],
            ],
        ],
    ],
];