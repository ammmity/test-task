<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
?><h1>Groups info id:1</h1>
<?php
    $APPLICATION->IncludeComponent(
        'groups.detail',
        '',
        [
            'ID' => '1',
            'CACHE_TIME' => '3600',
            'CACHE_TYPE' => 'A',
        ]
);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>