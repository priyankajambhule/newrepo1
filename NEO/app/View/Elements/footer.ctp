<!---<div class="container">

		  <div class="col-sm-7 pull-left">
             &copy; <?php echo date('Y');?> All rights reserved
          </div>	
          <div class="col-sm-5 pull-right">
            Ezee Society by <a href="http://www.tantranshsolutions.com/">Tantransh Solutions</a>
          </div>
          <div class="clearfix"></div>
       
  
    
	</div>--->
<?php
	echo $this->Html->script('../plugins/fastclick/lib/fastclick');

    echo $this->Html->script('../plugins/nprogress/nprogress');		
	echo $this->Html->script('../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min');		
	echo $this->Html->script('admin/inner/custom.min');		
	?>

  </body>
  </html>	