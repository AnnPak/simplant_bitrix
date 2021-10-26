<section class="client-block">
    <h2 class="client-block_head">Наши клиенты</h2>

    <div class="client-block_slider-wrap">
      <?foreach ($arResult["ITEM"] as $item_id => $item): ?>
          <div class="client-block_slider">
            <img src="<?=$item["DETAIL_PICTURE"]?>" alt="brand_<?=$item['ID']?>">
          </div>
      <?endforeach;?>
    </div>
</section>