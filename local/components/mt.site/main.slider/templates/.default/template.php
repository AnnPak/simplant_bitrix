<section class="main-slider">
    <div class="main-slider_wrapper">
      <? foreach ($arResult["ITEM"] as $item_id => $item):?>
        <div class="main-slider_item" 
              data-target="1" 
              style="background-image: linear-gradient(0deg, rgba(16, 44, 81, 0.83), rgba(16, 44, 81, 0.83)), url('<?=$item["PREVIEW_PICTURE"]?>');">
          
          <h1 class="main-slider_content-header"><?=$item["PREVIEW_TEXT"]?></h1>

          <span class="main-slider_content-txt"><?=$item["DETAIL_TEXT"]?></span>

          <input name="slider-button_<?=$item["ID"]?>" type="button" value="Узнать подробнее"onclick="window.location.href = '<?=$item['PROPERTY_SLIDER_LNK_VALUE']?>"  >
        </div>
      <?endforeach?>
    </div>
  </section>

