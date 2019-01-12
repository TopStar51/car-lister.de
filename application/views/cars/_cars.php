<?php foreach ($cars as $carInfo) { ?>
<div class="car-item my-shadow">
    <div class="item-header">
        <label class="car-title"><?=get_car_name($carInfo)?></label>
        <span class="type">(<?=$carInfo['car_type']?>)</span>
        <span class="timestamp"><?=get_car_timestamp($carInfo)?></span>
    </div>
    <div class='item-body'>
        <a href="javascript:detail_car(<?=$carInfo['id']?>, '<?=$carInfo['car_type']?>');" class="car-avatar">
            <img src="<?=get_car_img($carInfo)?>">
        </a>
        <div style="margin-right: 10px; min-width: 160px;">
            <label class="car-price"><?=get_car_price($carInfo)?></label>
            <div class="">
                <img src="<?=base_url('assets/custom/img/label_privat.png')?>">
                <span style="width: 10px;"></span>
                <img src="<?=base_url('assets/custom/img/label_unfall.png')?>">
            </div>
            <div>
                <div style="margin-bottom: 5px;"><span><?=get_car_plz($carInfo)?> <?=get_car_city($carInfo)?></span></div>
                <div style="margin-bottom: 5px;"><span>Tel / handler_nummer</span></div>
                <div style="margin-bottom: 5px;"><span>Distance in km</span></div>
            </div>
        </div>
        <div style="width: 100%;">
            <div style="margin-bottom: 10px;">
                <?php
                foreach (car_options() as $option) { 
                ?>
                <span style="font-weight: bold;"><?=$option?>:</span>
                <span><?=get_car_option($carInfo, $option)?></span>
                <?php
                }
                ?>
            </div>
            <div style="display: flex;">
                <?php 
                $index = 0;
                foreach (equip_options() as $option) { 
                    //to show arranged, show 3 item in a column
                    if ($index % 3 == 0) {
                        //width is different for each index
                        if ($index / 3 == 0) {
                            $width = 70;
                        } else if ($index / 3 == 1) {
                            $width = 110;
                        } else if ($index / 3 == 2) {
                            $width = 100;
                        } else $width = 80;
                        echo '<div style="width: '.$width.'px;">';
                    }
                    $index += 1;
                ?>
                    <label class="mt-checkbox mt-checkbox-outline"> <?=$option?>
                        <input type="checkbox" name="test" <?=has_equip($carInfo, $option) ? 'checked' : ''?> disabled/>
                        <span></span>
                    </label>
                <?php
                    if ($index % 3 == 0) {
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="item-tail">
            <?php 
            if ($carInfo['car_type'] == 'autos_mobile') { 
                $img = 'logo_mobilede'; 
            } else if ($carInfo['car_type'] == 'autos_scout24') {
                $img = 'logo_autoscout'; 
            } else if ($carInfo['car_type'] == 'autos_kleinanzeigen') {
                $img = 'logo_ebaykleinanzeige'; 
            }
            ?>
            <img src="<?=base_url('assets/custom/img/'.$img.'.png')?>" class="car-type-logo">
            <div class="car-buttons">
                <a href="javascript:;"><img src="<?=base_url('assets/custom/img/symbol_telefon.png')?>"></a>
                <a href="javascript:park_car(<?=$carInfo['id']?>, '<?=$carInfo['car_type']?>');"><img src="<?=base_url('assets/custom/img/symbol_parking.png')?>"></a>
                <a data-car-id = "<?=$carInfo['id']?>" data-car-type = "<?=$carInfo['car_type']?>" class="btn-car-delete" href="javascript:;"><img src="<?=base_url('assets/custom/img/symbol_delete.png')?>"></a>
            </div>
        </div>
    </div>
</div>
<?php } ?>