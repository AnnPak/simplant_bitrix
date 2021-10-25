<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?global $isShowSale, $isShowCatalogSections, $isShowCatalogElements, $isShowMiddleAdvBottomBanner, $isShowBlog, $isShowReviews;?>
<div class="grey_block">
	<div class="maxwidth-theme">
		<?$APPLICATION->IncludeComponent(
			"mt.site:main.slider", 
			".default", 
			array(),
			false
		);?>

		<?$APPLICATION->IncludeComponent(
			"mt.site:main.sections", 
			".default", 
			array(),
			false
		);?>
	</div>

	<?$APPLICATION->IncludeComponent(
			"mt.site:main.benefits", 
			".default", 
			array(),
			false
		);?>
</div>
