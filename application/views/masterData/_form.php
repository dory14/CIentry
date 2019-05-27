<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i><?=$title;?></h5>
  </div>
<div class="panel-body">
<div class='container'>
<?php  validation_errors();?>
<?=form_open($action);?>

<div role='form'>
 <div class="col-sm-12">
	<div class='form-group'>	
	<label  class="col-sm-2 control-label">Kode Rekening</label>
     <div class="col-sm-6">
     	<?=form_input('kd_rek',$entry['kd_rek'],['class'=>'form-control',"required placeholder"=>"Kode Rekening"])?>
<br>
<?php echo form_error('kd_rek');?>
</div>
</div>
</div>
<div class="col-sm-12">
	<div class='form-group'>	
	<label  class="col-sm-2 control-label">Nama Rekening</label>
     <div class="col-sm-6">
     	<?=form_input('nm_rek',$entry['nm_rek'],['class'=>'form-control',"required placeholder"=>"Nama Rekening"])?>
<br>
<?php echo form_error('nm_rek');?>
</div>
</div>
</div>
<div class="col-sm-12">
	<div class='form-group'>	
	<label  class="col-sm-2 control-label">Target (Rp)</label>
     <div class="col-sm-6">
     	<?=form_input('target',$entry['target'],['class'=>'form-control',"required placeholder"=>"Targer Rp"])?>
<br>
<?php echo form_error('target');?>
</div>
</div>
</div>
	<div class="col-sm-offset-2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=form_submit('submit',$title,['class'=>'btn btn-info btn-nm'])?>
</div>

<?=form_close()?>
</div>
</div>
</div>