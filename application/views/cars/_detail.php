<div class="car-preview">
    <div>
        <label style="font-weight: bold; font-size: 26px;">RARITAT: <?=get_car_name($carInfo)?></label>
    </div>
    <div>
        <label style="font-weight: bold; font-size: 24px; color: yellowgreen;"><?=_l('price')?>: <?=get_car_price($carInfo)?> VB</label>
    </div>
    <div class="my-shadow" style="background: white; padding: 10px;">
        <div style="margin-bottom: 25px;">
            <img id="img-selected" style="border: solid 1px gray; min-height: 350px; width: 100%;">
            <div class="full-width-carousel-fix">
                <div class="blog-carousel">
                    <!-- carousel here? -->
                    <?php foreach (get_car_photos($carInfo) as $photo) { ?>
                    <img class="car-photo-item col-md-3 col-lg-4" src="<?=$photo?>">
                    <?php } ?>
                </div>
            </div>
        </div>
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