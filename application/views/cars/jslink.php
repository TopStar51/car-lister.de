<script>
    var strSearch = '';
    $(document).ready(function(){
        show_list();
        var get_car_data = function(){
            $.ajax({
                        url: '<?=site_url('cars/get_new_data')?>',
                        method: 'POST',
                        success: function(resp){
                            if (resp) {
                                $('#audio-alarm')[0].play();
                                $("div.car-list").append(resp);
                                 setTimeout(get_car_data(), 1000);
                            }
                        }
                });
        };
        get_car_data();
        
        $('.search-form').submit(function (e) {
            e.preventDefault();
            strSearch = $(this).find('input').val();
            //just search cars with given list
            $.post({
                url: '<?=site_url('cars/search')?>',
                data: {
                   search: strSearch
                },
                success:function (resp) {
                    if (resp) {
                        $('.car-list').html(resp);
                    }
                }
            });
        });
        
        $('.car-list').on('click', '.btn-car-delete', function(e) {
            e.preventDefault();
            
            var car_id = $(this).data("car-id");
            var car_type = $(this).data("car-type");
            delete_car(car_id, car_type, $(this));
        });
        
        $('#audio-alarm').on('play', function() {
            $('#header_notification_bar').css('background', 'crimson');
        });
        
        $('#audio-alarm').on('ended', function() {
            $('#header_notification_bar').css('background', 'none');
        });
        
        $('.div-detail').on('click', '.car-photo-item', function () {
            $('#img-selected').attr('src', $(this).attr('src'));
        });
        
        make_carousel();
    });
    
    function park_car(car_id, car_type) {
        $.post({
            url: "<?=site_url('cars/api_park')?>",
            data: {
                car_id: car_id,
                car_type: car_type
            },
            dataType: 'json',
            success: function (resp) {
                //nothign to do ...
            }
        });
    }
    
    function detail_car(car_id, car_type) {
        $.post({
            url: "<?=site_url('cars/detail_car')?>",
            data: {
                car_id: car_id,
                car_type: car_type
            },
            success: function (resp) {
                //load detail view, make carousel, then what?
                if (resp) {
                    $('.div-detail').html(resp);
                    $('.car-preview').removeClass('hide-detail');
                    $('.car-list').addClass('hide-list');
                    make_carousel();
                }
            }
        });
    }
    
    function make_carousel() {
        $('.blog-carousel').slick({
            infinite: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            responsive: [
                    {
                      breakpoint: 1365,
                      settings: {
                            slidesToShow: 5,
                            dots: false,
                            arrows: true
                      }
                    },
                    {
                      breakpoint: 992,
                      settings: {
                            slidesToShow: 3,
                            dots: false,
                            arrows: true
                      }
                    },
                    {
                      breakpoint: 768,
                      settings: {
                            slidesToShow: 2,
                            dots: true,
                            arrows: false
                      }
                    }
            ]
        });
    }
    
    function delete_car(car_id, car_type, el) {
        $.post({
           url: "<?=site_url('cars/delete_car')?>" ,
           data: {
                car_id: car_id,
                car_type: car_type
            },
            dataType: 'json',
            success: function (resp) {
                if (resp.status) {
                    el.closest('.car-item').remove();
                }
            }
        });
    }

    function show_list() {
        $('.car-preview').addClass('hide-detail');
        $('.car-list').removeClass('hide-list');
    }
</script>
