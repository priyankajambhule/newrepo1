<div class="modal fade" id="AddMessageModal" tabindex="-1" role="dialog" aria-labelledby="AddMessageModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Message</h4>
		
      </div>
	  <?php 
		echo $this->Form->create('ChatMessage', array(
		'class' => 'form-horizontal', 			
		'id'=>'addChatMessage',
		
		));			
		?>
 <div class="container" style="padding: 14px 0px;background-color: #E6E9E8;">
	  <div class="col-sm-12" id="messageDiv3">
	  
	  </div>
	 <div class="col-sm-12">
	    <div class="row">
		  <div class="form-group">
		    <div class="col-sm-4" style="padding-left: 25px;">
		      <label>Department<span class="required">*</span>:</label>
		    </div>
		  <div class="col-sm-8">
		      <?php echo $this->Form->input('role_id',array('id'=>'role_id','class'=>'form-control select_role_list','type'=>'select','options'=>$role,'empty'=>'Select ','label'=>false)); ?>
		  </div>
		
		  </div>
		</div>
	</div>
		
	<div class="col-sm-12">
	  <div class="row">
	    <div class="form-group">
	      <div class="col-sm-4" style="padding-left: 25px;">
		    <label>Recepient<span class="required">*</span>:</label>
	      </div>
		  <div class="col-sm-8">
		    <?php echo $this->Form->input('re_id',array('id'=>'re_id','class'=>'form-control select_user_list','type'=>'select','empty'=>'Select ','label'=>false)); ?>
		  </div>
	   </div>
	  </div>
    </div>
	
	<div class="col-sm-12">
	  <div class="row" style="padding-bottom: 15px;">
		<div class="col-sm-4" style="padding-left: 25px;">
		  <label class="control-label">Subject<span class="required">*</span>:</label>
		</div>
		<div class="col-sm-8">
		  <?php echo $this->Form->input('subject',array('type'=>'text','id'=>'subject','class'=>'form-control','label'=>false)); ?>
		</div>
	  </div>
	</div>
	
	<div class="col-sm-12">
	  <div class="row">
		 <div class="col-sm-4" style="padding-left: 25px;">
			<label >Messsage :</label>
		 </div>
		 <div class="col-sm-8">
		   <?php echo $this->Form->input('message',array('id'=>'message','class'=>'form-control','type'=>'textarea','rows'=>6,'cols'=>30,'label'=>false)); ?>
		 </div>
	  </div>
	</div>
				
				
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-info pull-right">Send</button>
      </div>
	 <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>

 <!------------------------------------View Message----------------------------------->


<div class="modal fade" id="ViewMessageModal" tabindex="-1" role="dialog" aria-labelledby="ViewMessageModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <h4 class="modal-title">Message</h4>
		
      </div>
	 <?php 
		echo $this->Form->create('ChatMessage', array(
		'class' => 'form-horizontal', 			
		'id'=>'markReadMessage',
		
		));			
		?>
 <div class="modal-body">
	  <div class="col-sm-12" id="messageDiv3">
	  
	  </div>	
	   <?php echo $this->Form->input('id',array('id'=>'msg_id','class'=>'form-control','type'=>'hidden','label'=>false)); ?>
		<div class="row">
		  <div class="col-sm-3" style="text-align:right;">
		  
		   <label>From  :</label>
		  </div>
		  <div class="col-sm-9">
		   <Label id='view_from'></Label>
		  </div>
		</div>
		<div class="row">
		  <div class="col-sm-3" style="text-align:right;">
		   <label >Subject  :</label>
		  </div>
		  <div class="col-sm-9">
		   <Label id='view_subject'></Label>
		  </div>
		</div>
		<div class="row">
		  <div class="col-sm-3" style="text-align:right;">
			<!--<div class="row voffset_1_7"></div>--><label >Messsage  :</label>
		  </div>
		  <div class="col-sm-9">
		     <Label id='view_message'></Label>
		  </div>
		</div>
				
				
	</div>
      <div class="modal-footer">
        <button onclick="disablebtn()" type="button" id="markRead" class="btn btn-default" data-dismiss="modal" disabled="disabled">Close</button>
         
      </div>
 <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
<?php echo $this->element('change_area'); ?> 
<script>
<!-------------------------------------------------------Send Message------------------------------------------->
$("#addChatMessage").on('submit', (function(e) {
	   
		e.preventDefault();
		var id="<?php echo $this->Session->read('Auth.User.id')?>";
		var re_id=$('#re_id').val();
		var subject=$('#subject').val();
		var message=$('#message').val();
		var role_id=$('#role_id').val();
		var dataString='id='+id+'&re_id='+re_id+'&subject='+subject+'&message='+message+'&role_id='+role_id;
		$.ajax({
			url: "<?php echo Router::url(array('controller' => 'commons','action' => 'addChatMessage','recept'=>false));?>" ,
			type: "POST",
			data:dataString,
			dataType: 'json',
			success: function(data)
			{
				if (data.status == 1000) 
				{	
					$("#messageDiv3").html('<div id="alertFadeOut" class="alert alert-success"><strong>Success!</strong> '+data.message+'.</div>');
					setTimeout(function() {$('#AddMessageModal').modal('hide');}, 100);
					document.getElementById("addChatMessage").reset();
					$('#alertFadeOut').fadeOut(4000, function () {
                          $('#alertFadeOut').text('');
                      });					
					
				}
				else 
				{
					$("#messageDiv3").html('<div id="alertFadeOut" class="alert alert-danger"><strong>Error!</strong> '+data.message+'.</div>');
					$('#alertFadeOut').fadeOut(4000, function () {
                          $('#alertFadeOut').text('');
                      });
					
				}
			}
		});
	}));
	
<!---------------------------------------Mark As Read--------------------------------->
	$("#markReadMessage").on('submit', (function(e) {
	   //alert();
		e.preventDefault();
		var id=$('#msg_id').val();
		
		var dataString='msg_id='+id;
		$.ajax({
			url: "<?php echo Router::url(array('controller' => 'commons','action' => 'markReadMessage','recept'=>false));?>" ,
			type: "POST",
			data:dataString,
			dataType: 'json',
			success: function(data)
			{
				if (data.status == 1000) 
				{	
					$("#messageDiv").html('<div id="alertFadeOut" class="alert alert-success"><strong>Success!</strong> '+data.message+'.</div>');
					setTimeout(function() {$('#ViewMessageModal').modal('hide');}, 100);
					document.getElementById("markReadMessage").reset();
					$('#alertFadeOut').fadeOut(4000, function () {
                          $('#alertFadeOut').text('');
                      });					
					
				}
				else 
				{
					$("#messageDiv3").html('<div id="alertFadeOut" class="alert alert-danger"><strong>Error!</strong> '+data.message+'.</div>');
					$('#alertFadeOut').fadeOut(4000, function () {
                          $('#alertFadeOut').text('');
                      });
					
				}
			}
		});
	}));
	
	
$("#addChatMessage").validate({
		   rules: {			
				"data[ChatMessage][subject]": {
                    required: true, 
					
                },
				"data[ChatMessage][message]": {
                    required: true, 
					
                },
				"data[ChatMessage][role_id]": {
                    required: true, 
					
                }
				,
				"data[ChatMessage][re_id]": {
                    required: true, 
					
                }
			},
            messages: {
				
				"data[ChatMessage][subject]": {
                    required: "Please enter Subject",                   
					
                },"data[ChatMessage][message]": {
                    required: "Please enter Message",                   
					
                },"data[ChatMessage][role_id]": {
                    required: "Please select Department",                   
					
                },"data[ChatMessage][re_id]": {
                    required: "Please select Recepient",                   
					
                }
            }
        
		});
function disablebtn(){
	$('#markRead').attr('disabled','disabled');
	setTimeout(function() {$('#ViewMessageModal').modal('hide');}, 50);
}
</script>