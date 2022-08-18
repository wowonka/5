<?php


class IblockAgent
{
    public static function clearOldLogs()
    {
        $iBlockRes = CIBlock::GetList(Array(), Array('NAME' => 'LOG'));
        $iBlock = $iBlockRes->Fetch();
        
        $res = CIBlockElement::GetList(Array("ID" => "DESC"), Array('IBLOCK_ID' => $iBlock["ID"]));
        
        $arrLog = [];

        while($ob = $res->GetNextElement())
        {
        $arFields = $ob->GetFields(); 
        array_push($arrLog, $arFields);
        }

        $ID = []; 
        
        foreach($arrLog as $value){
            array_push($ID, $value["ID"]);
        }        
        foreach($ID as $key => $value){
            if($key > 9) {
                CIBlockElement::Delete($value);
            }    
        }
        return "clearOldLogs();";        
    }    
}
