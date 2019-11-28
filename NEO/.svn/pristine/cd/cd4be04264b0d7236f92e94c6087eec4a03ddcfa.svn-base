<!DOCTYPE html>
<html lang="en">
    <head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title><?php echo $this->fetch('title'); ?></title>

	<?php       

echo $this->Html->css('../bootstrap/css/bootstrap.min');				
		
	//echo $this->Html->css('style');			
	echo $this->Html->css('main');			

	
	
	echo $this->Html->script('jquery-3.2.1.min');
	echo $this->Html->script('../bootstrap/js/bootstrap.min');
	echo $this->Html->script('../plugins/validations/jquery.validate.min');
	echo $this->Html->script('../plugins/validations/additional-methods.min');

      
	
	
     ?>       
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">  
    </head>    

<body>

<script>
$("#userLoginForm").on('submit', (function(e) {
		e.preventDefault();
		if($('#userLoginForm').valid()==true)
		{
		$.ajax({
			url: "<?php echo Router::url(array('controller' => 'pages','action' => 'homelogin'));?>" ,
			type: "POST",
			data: new FormData(this), 
			contentType: false,
			cache: false, 
			processData: false,
			dataType: 'json',
		
			success: function(data)
			{
				
				if (data.status == 1000) 
				{	
					$("#messageDiv").html('<div class="alert alert-success"><strong>Success!</strong> '+data.message+'.</div>');
					setTimeout(function() {$('#jotToSociety').modal('hide');}, 100);
					document.getElementById("userLoginForm").reset();
					
					
					location.href=data.url;
				}
				else 
				{
					$("#messageDivLogin").html('<div class="alert alert-danger"><strong>Error!</strong> '+data.message+'.</div>');
				}
			}
		});
		}
	}));
	</script>