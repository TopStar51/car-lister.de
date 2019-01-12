<div class="row">
    <div class="car-list">
    <?php 
        $this->load->view('cars/_cars', array('cars' => $cars));
    ?>
    </div>
    <div class="div-detail">
        <?php if (count($cars) > 0) {
            $this->load->view('cars/_detail', array('carInfo' => $cars[0]));
        }
        ?>
    </div>
    <audio id="audio-alarm" src="<?=base_url('assets/custom/audio/alarm.wav')?>"/>
</div>