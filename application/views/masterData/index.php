<a href="<?=base_url('entry/masterdata/add');?>" type="button" class="btn btn-primary btn-sm"><i class="icon-file-plus"></i> Tambah </a>
<p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i> <?=$title;?></h5>
  </div>
<div class="panel-body">
 <table class="table table-bordered datatable-columns">
       <thead>
<tr>
	<th class='hidden'>No</th>
	<th>Kode Rekening</th>
	<th>Nama Rekening</th>
	<th></th>
	<th>Target (Rp.)</th>
	<th>Action</th>
</tr>
</thead>
      <tbody>
<?php $no=0;?>
<?php foreach($entry as $data) :?>
	<tr>
	<td class='hidden'></td>
	<td><?=$data->kd_rek;?></td>
	<td><?=$data->nm_rek;?></td>
	<td ><?=++$no;?></td>
	<td><?=$data->target;?></td>
	<td><a href="<?=base_url('entry/masterdata/update/'.$data->kd_rek);?>" class='btn btn-success'><i class="icon-pencil5"></i></a>&nbsp;<a href="<?=base_url('entry/masterdata/delete/'.$data->kd_rek);?>" class='btn btn-danger'><i class="icon-trash"></i></a></td>
</tr>
<?php endforeach;?>
 </tbody>
</table>
</div>