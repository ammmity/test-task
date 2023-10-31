<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

// Параметры
$arComponentParameters = [
    'PARAMETERS' => [
        'LIST_TITLE'  =>  'Список групп',
        'CACHE_TIME'  =>  ['DEFAULT' => 3600],
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