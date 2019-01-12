<script>
    $(document).ready(function() {
        $.post({
            url: '<?=site_url('parking/parked_cars')?>',
            success: function(resp){
                if (resp) {
                    $("div.car-list").html(resp);
                    
                    $('.btn-car-delete').click(function(e) {
                        e.preventDefault();

                        var el = $(this);
                        var car_id = el.data('car-id');
                        var car_type = el.data('car-type');
                        delete_car(car_id, car_type, $(this));
                    });
                }
            }
        });
        show_list();
        
        $('.search-form').submit(function (e) {
            e.preventDefault();
            var search = $(this).find('input').val();
            $.post({
                url: '<?=site_url('parking/parked_cars')?>',
                data: {
                   search: search
                },
                success:function (resp) {
                    if (resp) {
                        $('.car-list').html(resp);
                    }
                }
            });
        });
        
        $('.div-detail').on('click', '.car-photo-item', function () {
            $('#img-selected').attr('src', $(this).attr('src'));
        });

        make_carousel();
    });
    
    function delete_car(car_id, car_type, el) {
        $.post({
            url: '<?=site_url('parking/delete_park')?>',
            data: {
                car_id: car_id,
                car_type: car_type
            },
            dataType: 'json',
            success: function (resp) {
                if (resp.status) {
                    //remove div for given car --> 
                    el.closest('.car-item').remove();
                } else {
                }
            }
        });
    }
    
    function park_car(car_id, car_type) {
        //do nothing
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
    
    function show_list() {
        $('.car-preview').addClass('hide-detail');
        $('.car-list').removeClass('hide-list');
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
</script>