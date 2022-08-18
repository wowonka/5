<?php


class Iblock
{    
    public function addLog(&$arFields)
    {
        $iBlockRes = CIBlock::GetList(Array(), Array('ID'=>$arFields["IBLOCK_ID"]));
        $iBlock = $iBlockRes->Fetch();
        
        $iBlockSectionRes = CIBlockSection::GetList(Array(), Array('ID'=>$arFields["IBLOCK_SECTION"][0]));
        $iBlockSection = $iBlockSectionRes->Fetch();

        if($iBlock['NAME'] != "LOG") {
            if($arFields["ID"]>0) {
                $CIBlockGetListRes = CIBlock::GetList(Array(), Array('NAME'=>"LOG"));
                $CIBlockGetList = $CIBlockGetListRes->Fetch(); 
                
                if($CIBlockGetList['ID'] > 0) {

                    $CIBlockSectionGetListRes = CIBlockSection::GetList(Array(), Array('NAME'=>'[' . $iBlock['ID'] . '] ' . $iBlock['NAME']));
                    $CIBlockSectionGetList = $CIBlockSectionGetListRes->Fetch();                   
                    
                    if($CIBlockSectionGetList["ID"] == 0) {
                        $CIBlockSection = new CIBlockSection;
                        $CIBlockSection = Array(
                                "ACTIVE" => "Y",                            
                                "IBLOCK_ID" => $CIBlockGetList['ID'],
                                "NAME" => '[' . $iBlock['ID'] . '] ' . $iBlock['NAME']                                               
                            
                        );
                        $CIBlockSectionGetListRes = CIBlockSection::GetList(Array(), Array('NAME'=>'[' . $iBlock['ID'] . '] ' . $iBlock['NAME']));
                        $CIBlockSectionGetList = $CIBlockSectionGetListRes->Fetch();
                    }

                    $CIBlockElement = new CIBlockElement;

                    $arLoadProductArray = Array(
                        
                          
                                "IBLOCK_SECTION_ID" => $CIBlockSectionGetList["ID"],
                                "IBLOCK_ID"      => $CIBlockGetList['ID'],
                                "NAME"           => 'ID элемента: ' . $arFields["ID"],
                                "ACTIVE"         => "Y",            // активен
                                "PREVIEW_TEXT"   => "Добавлен элемент ?" . $iBlock['NAME'] . " -> " . $iBlockSection["NAME"] . " -> " . $arFields["NAME"] . "?",
                                "DETAIL_TEXT"    => "Добавлен элемент ?" . $iBlock['NAME'] . " -> " . $iBlockSection["NAME"] . " -> " . $arFields["NAME"] . "?",
                                "ACTIVE_FROM" => date("d.m.Y H:i:s"), 
                            
                        );
                        if($PRODUCT_ID = $CIBlockElement->Add($arLoadProductArray))
                        echo "New ID: ".$PRODUCT_ID;
                      else
                        echo "Error: ".$CIBlockElement->LAST_ERROR;
                }
            }
        }    

    } 
    

    public function updateLog(&$arFields)
    {

        $iBlockRes = CIBlock::GetList(Array(), Array('ID'=>$arFields["IBLOCK_ID"]));
            $iBlock = $iBlockRes->Fetch();
            
            $iBlockSectionRes = CIBlockSection::GetList(Array(), Array('ID'=>$arFields["IBLOCK_SECTION"][0]));
            $iBlockSection = $iBlockSectionRes->Fetch();

            if($iBlock['NAME'] != "LOG") {
                if($arFields["ID"]>0) {
                    $CIBlockGetListRes = CIBlock::GetList(Array(), Array('NAME'=>"LOG"));
                    $CIBlockGetList = $CIBlockGetListRes->Fetch(); 
                    
                    if($CIBlockGetList['ID'] > 0) {

                        $CIBlockSectionGetListRes = CIBlockSection::GetList(Array(), Array('NAME'=>'[' . $iBlock['ID'] . '] ' . $iBlock['NAME']));
                        $CIBlockSectionGetList = $CIBlockSectionGetListRes->Fetch();                   
                        
                        if($CIBlockSectionGetList["ID"] == 0) {
                            $CIBlockSection = new CIBlockSection;
                            $CIBlockSection = Array(
                                    "ACTIVE" => "Y",                            
                                    "IBLOCK_ID" => $CIBlockGetList['ID'],
                                    "NAME" => '[' . $iBlock['ID'] . '] ' . $iBlock['NAME']                                               
                                
                            );
                            $CIBlockSectionGetListRes = CIBlockSection::GetList(Array(), Array('NAME'=>'[' . $iBlock['ID'] . '] ' . $iBlock['NAME']));
                            $CIBlockSectionGetList = $CIBlockSectionGetListRes->Fetch();
                        }

                        $CIBlockElement = new CIBlockElement;

                        $arLoadProductArray = Array(
                            
                            
                                    "IBLOCK_SECTION_ID" => $CIBlockSectionGetList["ID"],
                                    "IBLOCK_ID"      => $CIBlockGetList['ID'],
                                    "NAME"           => 'ID элемента: ' . $arFields["ID"],
                                    "ACTIVE"         => "Y",            // активен
                                    "PREVIEW_TEXT"   => "Добавлен элемент ?" . $iBlock['NAME'] . " -> " . $iBlockSection["NAME"] . " -> " . $arFields["NAME"] . "?",
                                    "DETAIL_TEXT"    => "Добавлен элемент ?" . $iBlock['NAME'] . " -> " . $iBlockSection["NAME"] . " -> " . $arFields["NAME"] . "?",
                                    "ACTIVE_FROM" => date("d.m.Y H:i:s"), 
                                
                            );
                        $PRODUCT_ID = $CIBlockElement;
                        $res = $CIBlockElement->Update($PRODUCT_ID, $arLoadProductArray);
                    }
                }
            }    
        
    } 
}