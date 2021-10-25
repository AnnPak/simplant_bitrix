<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?global $isShowSale, $isShowCatalogSections, $isShowCatalogElements, $isShowMiddleAdvBottomBanner, $isShowBlog, $isShowReviews;?>
<div class="grey_block">
	<div class="maxwidth-theme">
	<?$APPLICATION->IncludeComponent(
	"aspro:com.banners.next", 
	"top_one_banner_1", 
	array(
		"IBLOCK_TYPE" => "aspro_next_adv",
		"IBLOCK_ID" => "27",
		"TYPE_BANNERS_IBLOCK_ID" => "1",
		"SET_BANNER_TYPE_FROM_THEME" => "N",
		"NEWS_COUNT" => "10",
		"NEWS_COUNT2" => "4",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "TEXT_POSITION",
			2 => "TARGETS",
			3 => "TEXTCOLOR",
			4 => "URL_STRING",
			5 => "BUTTON1TEXT",
			6 => "BUTTON1LINK",
			7 => "BUTTON2TEXT",
			8 => "BUTTON2LINK",
			9 => "",
		),
		"CHECK_DATES" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"BANNER_TYPE_THEME" => "TOP",
		"BANNER_TYPE_THEME_CHILD" => "TOP_SMALL_BANNER",
		"COMPONENT_TEMPLATE" => "top_one_banner_1",
		"FILTER_NAME" => "arRegionLink",
		"CATALOG" => "/catalog/"
	),
	false
);?>


		<?$APPLICATION->IncludeComponent(
			"mt.site:main.sections", 
			".default", 
			array(),
			false
		);?>
		</div>
	</div>

	<?$APPLICATION->IncludeComponent(
			"mt.site:main.benefits", 
			".default", 
			array(),
			false
		);?>

	<?$APPLICATION->IncludeComponent(
	"mt.site:main.add_question", 
	".default", 
	array(),
	false
	);?>

<div class="maxwidth-theme">	
	<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
		array(
			"COMPONENT_TEMPLATE" => ".default",
			"PATH" => SITE_DIR."include/mainpage/comp_brands.php",
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "",
			"AREA_FILE_RECURSIVE" => "Y",
			"EDIT_TEMPLATE" => "standard.php"
		),
		false
	);?>
</div>

</div>