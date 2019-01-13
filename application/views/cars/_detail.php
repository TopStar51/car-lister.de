<div class="car-preview">
    <div>
        <label style="font-weight: bold; font-size: 26px;">RARITAT: <?=get_car_name($carInfo)?></label>
    </div>
    <div>
        <label style="font-weight: bold; font-size: 24px; color: yellowgreen;"><?=_l('price')?>: <?=get_car_price($carInfo)?> VB</label>
    </div>
    <div class="my-shadow" style="background: white; padding: 10px;">
        <?php 
            $photos = get_car_photos($carInfo);
            if (count($photos) > 0) {
                $first_photo = $photos[0];
        ?>
        <div style="margin-bottom: 25px;">
            <div style="display: flex;">
                <img id="img-selected" <?=isset($first_photo) ? 'src="'.$first_photo.'"' : ''?> style="border: solid 1px gray; height: 350px; width: auto; margin: auto;">
            </div>
            <div class="full-width-carousel-fix">
                <div class="blog-carousel">
                    <!-- carousel here? -->
                    <?php foreach (get_car_photos($carInfo) as $photo) { ?>
                    <img class="car-photo-item col-md-3 col-lg-4" src="<?=$photo?>">
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
            } else {
        ?>
        <div style="text-align: center; margin: 50px 0px;">
            <h3><?=_l('no_available_photos')?></h3>
        </div>
        <?php
            }
        ?>
        
        <div style="border-bottom: solid 1px lightgray; padding-bottom: 10px;">
            <label style="font-weight: bold; margin-top: 3px;">Details</label>
            <div style="float: right; display: flex;">
                <span style="margin: auto 5px;">Weiterempfehlen: </span>
                <ul>
                    <li><a href="#"><span class="badge grey-badge-ring"><i class="fa fa-envelope"></i></span></a></li>
                    <li><a href="#"><span class="badge blue-badge-ring"><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="badge cyan-badge-ring"><i class="fa fa-pinterest"></i></span></a></li>
                    <li><a href="#"><span class="badge red-badge-ring"><i class="fa fa-facebook"></i></span></a></li>
                </ul>
            </div>
        </div>
        <div style="padding-top: 10px;">
            <table class="car-detail" style="width: 100%;">
                <?php 
                $index = 0;
                foreach (car_details() as $key => $value) { ?>
                <tr <?=$index % 2 ? 'style="background-color: #eeedee;"' : ''?>>
                    <td class="col-md-4 padding-5"><?=_l($value)?>:</td>
                    <td class="col-md-8 padding-5"><?=get_car_option($carInfo, $value)?></td>
                </tr>
                <?php $index += 1; } ?>
            </table>
        </div>
        <div style="text-align: right;" class="btn-to-list">
            <button class="btn btn-info" onclick="show_list()"><?=_l('to_car_list')?></button>
        </div>
    </div>
</div>