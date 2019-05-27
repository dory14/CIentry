<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i><?=$title;?></h5>
  </div>
<div class="panel-body">
<div class='container'>
	<br>
<?php  validation_errors();?>
<?php foreach ($option as $row):
		 	$options[$row->kd_rek]=$row->kd_rek." -- ".$row->nm_rek;
		 	$option=$options[$row->kd_rek]=$row->kd_rek." -- ".$row->nm_rek;
		 endforeach;
		
		if(!$option){
	$options=[""=>"--Data Master kosong--"];
}
?>
<?=form_open($action);?>
<?=form_hidden('id_transaksi',$entry['id_transaksi'])?>
<?php echo form_error('id_transaksi');?>
<div role='form'>
 <div class="col-sm-12">
	<div class='form-group'>	
	<label  class="col-sm-2 control-label">Kode/Nama Rekening</label>
     <div class="col-sm-6">
		<?=form_dropdown(['name'=>'kd_rek','class'=>'form-control',"class"=>"select-clear"],$options)?>
		<br>
		<?php echo form_error('kd_rek');?>
		<br>
	</div>
	</div>
</div>
 <div class="col-sm-12">
	<div class='form-group'>
	<label  class="col-sm-2 control-label">Tanggal Setor</label>
	<div class="col-sm-6">
		<?=form_input("tgl",$entry['tgl_stor'],["id"=>"tgl","class"=>"form-control","required placeholder"=>"Tanggal Setor"])?>
		<br>
		<?php echo form_error('tgl');?>
	</div>
	</div>
</div>
	<div class="col-sm-12">
	<div class='form-group'>
	<label  class="col-sm-2 control-label">Jumlah Bayar</label>
	<div class="col-sm-6">
		<?=form_input('jml',$entry['jml_bayar'],['class'=>'form-control',"required placeholder"=>"Jumlah Bayar (Rp)"])?>
		<br>
		<?php echo form_error('jml');?>
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
<script type="text/javascript">  
    $("#tgl").datepicker({
        format: 'yyyy-mm-dd',
        language: 'id'
    });
</script>