<script>

	$(document).ready(function(){
		var car_list = [];
		var get_car_data = function(){
			$.ajax({
				url: '<?=base_url()?>cars/get_new_data',
				method: 'POST',
				data: { last_id : last_id},
				dataType: 'json',
				success: function(resp){
					var car_list = resp.car_info;
					for(var i=0; i<car_list.length; i++){
						
					}
					$("div.car-list").prepend(resp.car_info);
					setTimeout(get_car_data(), 1000);
				}
			});
		}
	});

</script>