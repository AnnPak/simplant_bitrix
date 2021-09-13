<?
$arDisplays = array("block", "list", "table");
if(array_key_exists("display", $_REQUEST) || (array_key_exists("display", $_SESSION)) || $arParams["DEFAULT_LIST_TEMPLATE"]){
	if($_REQUEST["display"] && (in_array(trim($_REQUEST["display"]), $arDisplays))){
		$display = trim($_REQUEST["display"]);
		$_SESSION["display"]=trim($_REQUEST["display"]);
	}
	elseif($_SESSION["display"] && (in_array(trim($_SESSION["display"]), $arDisplays))){
		$display = $_SESSION["display"];
	}
	else{
		$display = $arParams["DEFAULT_LIST_TEMPLATE"];
	}
}
else{
	$display = "block";
}
$template = "catalog_".$display;
?>
<?if($bShowFilter):?>
	<div class="adaptive_filter">
		<a class="filter_opener<?=($_REQUEST['set_filter'] === 'y' ? ' active num' : '')?>"><i></i><span><?=GetMessage("CATALOG_SMART_FILTER_TITLE")?></span></a>
	</div>
<?endif;?>
<div class="sort_header view_<?=$display?>">
	<!--noindex-->
		<div class="sort_filter <?=(($bShowFilter && $arTheme['MOBILE_FILTER_COMPACT']['VALUE'] === 'Y') ? 'mobile_filter_compact' : '')?>">
			<?
			$arAvailableSort = array();
			$arSorts = $arParams["SORT_BUTTONS"];
			if(in_array("POPULARITY", $arSorts)){
				$arAvailableSort["SHOWS"] = array("SHOWS", "desc");
			}
			if(in_array("NAME", $arSorts)){
				$arAvailableSort["NAME"] = array("NAME", "asc");
			}
			if(in_array("PRICE", $arSorts)){
				$arSortPrices = $arParams["SORT_PRICES"];
				if($arSortPrices == "MINIMUM_PRICE" || $arSortPrices == "MAXIMUM_PRICE"){
					$arAvailableSort["PRICE"] = array("PROPERTY_".$arSortPrices, "desc");
				}
				else{
					if($arSortPrices == "REGION_PRICE")
					{
						global $arRegion;
						if($arRegion)
						{
							if(!$arRegion["PROPERTY_SORT_REGION_PRICE_VALUE"] || $arRegion["PROPERTY_SORT_REGION_PRICE_VALUE"] == "component")
							{
								$price = CCatalogGroup::GetList(array(), array("NAME" => $arParams["SORT_REGION_PRICE"]), false, false, array("ID", "NAME"))->GetNext();
								$arAvailableSort["PRICE"] = array("CATALOG_PRICE_".$price["ID"], "desc");
							}
							else
							{
								$arAvailableSort["PRICE"] = array("CATALOG_PRICE_".$arRegion["PROPERTY_SORT_REGION_PRICE_VALUE"], "desc");
							}
						}
						else
						{
							$price_name = ($arParams["SORT_REGION_PRICE"] ? $arParams["SORT_REGION_PRICE"] : "BASE");
							$price = CCatalogGroup::GetList(array(), array("NAME" => $price_name), false, false, array("ID", "NAME"))->GetNext();
							$arAvailableSort["PRICE"] = array("CATALOG_PRICE_".$price["ID"], "desc");
						}
					}
					else
					{
						$price = CCatalogGroup::GetList(array(), array("NAME" => $arParams["SORT_PRICES"]), false, false, array("ID", "NAME"))->GetNext();
						$arAvailableSort["PRICE"] = array("CATALOG_PRICE_".$price["ID"], "desc");
					}
				}
			}

			if(in_array("QUANTITY", $arSorts)){
				$arAvailableSort["CATALOG_AVAILABLE"] = array("QUANTITY", "desc");
			}

			if($arParams['SHOW_SORT_RANK_BUTTON'] === 'Y'){
				$arAvailableSort['RANK'] = array('RANK', 'desc');
			}

			$sort = "SHOWS";
			if((array_key_exists("sort", $_REQUEST) && array_key_exists(ToUpper($_REQUEST["sort"]), $arAvailableSort)) || (array_key_exists("sort", $_SESSION) && array_key_exists(ToUpper($_SESSION["sort"]), $arAvailableSort)) || $arParams["ELEMENT_SORT_FIELD"]){
				if($_REQUEST["sort"]){
					$sort = ToUpper($_REQUEST["sort"]);

					if(
						$sort === 'RANK' &&
						$arParams['SHOW_SORT_RANK_BUTTON'] === 'Y'
					){
						$_SESSION["rank_sort"] = 'Y';
					}
					else{
						$_SESSION["rank_sort"] = 'N';
						$_SESSION["sort"] = ToUpper($_REQUEST["sort"]);
					}
				}
				elseif(
					$_SESSION["rank_sort"] === 'Y' &&
					$arParams['SHOW_SORT_RANK_BUTTON'] === 'Y'
				){
					$sort = 'RANK';
				}
				elseif($_SESSION["sort"]){
					$sort = ToUpper($_SESSION["sort"]);
				}
				else{
					$sort = ToUpper($arParams["ELEMENT_SORT_FIELD"]);
				}
			}

			$sort_order=$arAvailableSort[$sort][1];
			if((array_key_exists("order", $_REQUEST) && in_array(ToLower($_REQUEST["order"]), Array("asc", "desc"))) || (array_key_exists("order", $_REQUEST) && in_array(ToLower($_REQUEST["order"]), Array("asc", "desc")) ) || $arParams["ELEMENT_SORT_ORDER"]){
				if($sort === 'RANK'){
					$sort_order = 'desc';
				}
				elseif($_REQUEST["order"]){
					$sort_order = $_REQUEST["order"];
					$_SESSION["order"] = $_REQUEST["order"];
				}
				elseif($_SESSION["order"]){
					$sort_order = $_SESSION["order"];
				}
				else{
					$sort_order = ToLower($arParams["ELEMENT_SORT_ORDER"]);
				}
			}
			?>
			<?foreach($arAvailableSort as $key => $val):?>
				<?$newSort = $sort_order == 'desc' ? 'asc' : 'desc';?>
				<a rel="nofollow" href="<?=$APPLICATION->GetCurPageParam('sort='.$key.($key !== 'RANK' ? '&order='.$newSort : ''), array('sort', 'order'))?>" class="sort_btn <?=($sort == $key ? 'current' : '')?> <?=$sort_order?> <?=$key?>" rel="nofollow">
					<i class="icon" title="<?=GetMessage('SECT_SORT_'.$key)?>"></i><span><?=GetMessage('SECT_SORT_'.$key)?></span><?if($key !== 'RANK'):?><i class="arr icons_fa"></i><?endif;?>
				</a>
			<?endforeach;?>
			<?
			if($sort == "PRICE"){
				$sort = $arAvailableSort["PRICE"][0];
			}

			if($sort == "CATALOG_AVAILABLE"){
				$sort = "CATALOG_QUANTITY";
			}
			?>
		</div>
		<div class="sort_display">
			<?foreach($arDisplays as $displayType):?>
				<a rel="nofollow" href="<?=$APPLICATION->GetCurPageParam('display='.$displayType, 	array('display'))?>" class="sort_btn <?=$displayType?> <?=($display == $displayType ? 'current' : '')?>"><i title="<?=GetMessage("SECT_DISPLAY_".strtoupper($displayType))?>"></i></a>
			<?endforeach;?>
		</div>
		<div class="clearfix"></div>
	<!--/noindex-->
</div>