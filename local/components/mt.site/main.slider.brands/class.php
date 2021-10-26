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

class mtsite_main_slider_brands extends CBitrixComponent{
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
      "DETAIL_PICTURE",
    );
  
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    while($ob = $res->GetNextElement()){
      $arFields = $ob->GetFields();
      $arFields["DETAIL_PICTURE"] = CFile::GetPath($arFields["DETAIL_PICTURE"]);
      $this->arResult["ITEM"][$arFields["ID"]]  = $arFields;
    }
  }
}