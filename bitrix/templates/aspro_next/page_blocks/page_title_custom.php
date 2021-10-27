<div class="top_inner_block_wrapper maxwidth-theme">
	<div class="page-top-wrapper page-top-custom">
		<section class="page-top page-top-custom maxwidth-theme <?CNext::ShowPageProps('TITLE_CLASS');?>">
			<div class="page-top-main">
				<?=$APPLICATION->ShowViewContent('product_share')?>
				<h1 id="pagetitle" class="page-top-custom_title"><?$APPLICATION->ShowTitle(false)?></h1>
			</div>
			<div id="navigation">
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "next", array(
					"START_FROM" => "0",
					"PATH" => "",
					"SITE_ID" => SITE_ID,
					"SHOW_SUBSECTIONS" => "N"
					),
					false,
					array("HIDE_ICONS"=>"Y")
				);?>
			</div>
		</section>
	</div>
</div>