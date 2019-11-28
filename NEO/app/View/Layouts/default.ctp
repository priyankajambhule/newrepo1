<?php echo $this->element('header'); 

?>
<!-- Content Wrapper. Contains page content -->
<?php //echo $this->element('admin/breadcrumb'); ?> 
<?php //echo $this->element('validation_error'); ?>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->fetch('content'); ?>	   
<?php echo $this->element('footer'); ?>