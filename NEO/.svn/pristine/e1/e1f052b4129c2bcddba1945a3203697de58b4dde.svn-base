<script type="text/javascript">

$(".select_country_list").on('change focus',function() {
	var id = $(this).val();			
	$(".select_state_list").find('option').remove();
	$('<option>').val('').text(' Select State ').appendTo($(".select_state_list"));			
	if (id) {
	var dataString = 'id='+ id;
	$.ajax({
		type: "POST",
		url: '<?php echo Router::url(array("controller"=>"commons","action" => "getStates",'admin'=>false)); ?>',
		data: dataString,
		cache: false,
		success: function(html) {					
			
			$('.select_state_list').html(html.data);			
				
			if($( ".select_state_list" ).hasClass( "chosen-select" ))
			{
				$(".select_state_list").trigger("chosen:updated");								
			}			
		} 
	});
	}	
	});	

$(".select_state_list").on('change focus',function() {
	var id = $(this).val();			
	$(".select_city_list").find('option').remove();
	$('<option>').val('').text(' Select City/District ').appendTo($(".select_city_list"));			
	if (id) {
	var dataString = 'id='+ id;
	$.ajax({
		type: "POST",
		url: '<?php echo Router::url(array("controller"=>"commons","action" => "getCities",'admin'=>false)); ?>',
		data: dataString,
		cache: false,
		success: function(html) {								
			
			$('.select_city_list').html(html.data);			
				
			if($( ".select_city_list" ).hasClass( "chosen-select" ))
			{							
				$(".select_city_list").trigger("chosen:updated");			
			}		
			
		} 
	});
	}	
	});
	
	$(".select_city_list").on('change focus',function() {
	var id = $(this).val();			
	$(".select_taluka_list").find('option').remove();
	$('<option>').val('').text(' Select Taluka ').appendTo($(".select_taluka_list"));			
	if (id) {
	var dataString = 'id='+ id;
	$.ajax({
		type: "POST",
		url: '<?php echo Router::url(array("controller"=>"commons","action" => "getTalukas",'admin'=>false)); ?>',
		data: dataString,
		cache: false,
		success: function(html) {								
			
			$('.select_taluka_list').html(html.data);			
				
			if($( ".select_taluka_list" ).hasClass( "chosen-select" ))
			{							
				$(".select_taluka_list").trigger("chosen:updated");			
			}				
						
		} 
	});
	}	
	});
	
</script>
