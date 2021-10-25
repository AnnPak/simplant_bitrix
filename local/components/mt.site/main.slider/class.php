<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\HttpApplication;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Loader;
use Bitrix\Main\Tools;
use Bitrix\Main\Config\Option;
use Bitrix\Crm\EntityRequisite;
use \Bitrix\Main\Data\Cache;
use Bitrix\Sale;
use Bitrix\Main\Engine\Contract\Controllerable;

class mtsite_main_slider extends CBitrixComponent{
  public function executeComponent(){
    
    $this->getSlides();
    $this->includeComponentTemplate();
  }

  public function getSlides(){
    $arFilter = array( 
      "IBLOCK_ID" => $this->arParams["IBLOCK_ID"], 
      "ACTIVE" => "Y",
    );

    $arSelect = array(
      "ID",
      "NAME",
      "PREVIEW_PICTURE",
      "PREVIEW_TEXT",
      "DETAIL_TEXT",
      "PROPERTY_SLIDER_LNK"
    );
  
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    while($ob = $res->GetNextElement()){
      $arFields = $ob->GetFields();
      $arFields["PREVIEW_PICTURE"] = CFile::GetPath($arFields["PREVIEW_PICTURE"]);

      $this->arResult["ITEM"][$arFields["ID"]]  = $arFields;
    }
  }
}