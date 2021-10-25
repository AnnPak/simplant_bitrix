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

class mtsite_main_sections extends CBitrixComponent{
  public function executeComponent(){
      
    $this->includeComponentTemplate();
  }
}