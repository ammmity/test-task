<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
?><h1>Groups info complex component</h1>
    <?$APPLICATION->IncludeComponent(
	"groups",
	"",
	Array(
		"LIST_TITLE" => "Список групп",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"SEF_FOLDER" => "/groups/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("list"=>"","view"=>"#ID#/")
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>