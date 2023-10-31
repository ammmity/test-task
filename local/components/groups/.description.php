<?php
use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


$arComponentDescription = array(
    "ID" => 'KOMPOT',
    "NAME" => Loc::getMessage('KOMPOT_GROUPS_NAME'),
    "DESCRIPTION" => Loc::getMessage('KOMPOT_GROUPS_DESC'),
    "ICON" => "",
    "COMPLEX" => "Y",
    "PATH" => array(
        "ID" => 'KOMPOT',
        "NAME" => 'KOMPOT',
    ),
);

?>