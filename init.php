<?php
require __DIR__ . '*/../../../vendor/autoload.php';

if(file_exists($_SERVER["DOCUMENT_ROOT"]."/local/modules/devsite/lib/Handlers/Iblock.php")){
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/devsite/lib/Handlers/Iblock.php");
}
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("Iblock", "addLog"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("Iblock", "updateLog"));
\Bitrix\Main\Loader::includeModule('iblock');

if(file_exists($_SERVER["DOCUMENT_ROOT"]."/local/modules/devsite/lib/Agents/Iblock.php")){
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/devsite/lib/Agents/Iblock.php");
}

 CAgent::AddAgent("Iblock::clearOldLogs();", "", "N", "3600", "", "Y", "18.08.2022 02:05");