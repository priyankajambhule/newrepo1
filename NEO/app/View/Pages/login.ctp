<?php echo $this->Html->css('../plugins/bootstrap-datepicker/css/bootstrap-datepicker.min'); ?>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
	<br><br>
	<style>
	
	.mar{margin-left:50px}
	</style>
	<div class="row">
<div id="messageDiv"></div>
		<div class="col-sm-8">		
		<?php echo $this->element('flash'); ?> 		 		
		<?php 
		echo $this->Form->create('Login', array(
		'url'=>array('controller'=>'pages','action'=>'login'),
		'class' => 'form-inline search_form', 			
		'novalidate' => true,		
		'role' => 'form',
		'inputDefaults' => array(
		'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
		'div' => array('class' => 'form-group'),
		'class' => array('form-control'),
		'label' => array('control-label'),
		'between' => '',
		'after' => '',
		'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
		)));	
		?>	
		<div class="mar">
	
		<?php echo $this->Form->input('fromdate',array('class'=>'form-control date-picker','placeholder'=>'From Date','label'=>false)); ?>   </div>
		<div class="mar">
		<?php echo $this->Form->input('todate',array('class'=>'form-control date-picker','placeholder'=>'To Date','label'=>false)); ?>   
		</div>
		<div class="mar">
		<?php
		echo $this->Form->button('Search',array('type'=>'submit','class'=>'btn btn-primary','value'=>'Search','name'=>'data[Login][Search]'));
		?>	
		</div>
			<!--<div  style="margin-left:20px;">
		<?php
		echo $this->Html->link('Reset',
		array('controller' => 'pages','action' => 'resetUserSearch','ext'=>URL_EXTENSION),
		array('escape'=>false,'class'=>'btn btn-info','title'=>'Reset Search'),array());			
		?>	
		</div>-->
		<?php echo $this->Form->end(); 	?>		
		</div>
		<div class="col-sm-4 col-md-4">
	
		</div>
		</div>

		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<script>
		$(document).ready(function() {
    $(".date-picker").datepicker({
	autoclose: true,

	orientation: "top",
	todayHighlight: true,
	format: "dd-mm-yyyy",
});
		});
		</script>