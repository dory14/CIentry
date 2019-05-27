<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i><?=$title;?></h5>
  </div>
<div class="panel-body">
<div class='container'>
<?php  validation_errors();?>
<?=form_open($action);?>
<?=form_hidden('id_user',$user['id_user']);?>
<div role='form'>
 <div class="col-sm-12">
	<div class='form-group'>	
	<label  class="col-sm-2 control-label">UserName</label>
     <div class="col-sm-6">
     	<?=form_input('username',$user['username'],['class'=>'form-control',"required placeholder"=>"UserName"])?>
<br>
<?php echo form_error('username');?>
</div>
</div>
</div>
<div class="col-sm-12">
	<div class='form-group'>	
	<label  class="col-sm-2 control-label">Password</label>
     <div class="col-sm-6">
     	<?=form_password(['name'=>'password','class'=>'form-control',"required placeholder"=>"Password"])?>
<br>
<?php echo form_error('password');?>
</div>
</div>
</div>
<div class="col-sm-12">
  <div class='form-group'>  
  <label  class="col-sm-2 control-label">Status</label>
     <div class="col-sm-6">
      <?=form_input('status',$user['status'],['class'=>'form-control',"required placeholder"=>"Status"])?>
<br>
<?php echo form_error('status');?>
</div>
</div>
</div>
<div class="col-sm-12">
	<div class='form-group'>	
	<label  class="col-sm-2 control-label">Level</label>
     <div class="col-sm-6">
     	<center>
           <select required data-placeholder="~~~ Pilih Akses ~~~" name="akses" class="select-clear">
              <option value=""></option>
              <option value="1">Superadmin</option>
              <option value="2">Admin</option>
              
          </select>
        </center>
<br>
<?php echo form_error('akses');?>
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