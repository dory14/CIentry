<a href="<?=base_url('entry/hariandata/add');?>" type="button" class="btn btn-primary btn-sm"><i class="icon-file-plus"></i> Tambah </a>
<p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i> <?=$title;?></h5>
  </div>
<div class="panel-body">
 <table class="table table-bordered datatable-columns">
       <thead>
<tr>
	<th class='hidden'></th>
	<th>Kode Rekening</th>
	<th>Nama Rekening</th>
	<th></th>
	<th>Tanggal Setor</th>
	<th>Jumlah Bayar</th>
	<th>Action</th>
</tr>
</thead>
      <tbody>
<?php $no=0; foreach($entry as $data): $no++;?>
	<tr>
	<td class='hidden'></td>
	<td><?=$data->kd_rek;?></td>
	<td><?=$data->nm_rek;?></td>
	<td></td>
	<td><?=$data->tgl_stor;?></td>
	<td><?=$data->jml_bayar;?></td>
	<td><a href="<?=base_url('entry/hariandata/update/'.$data->id_transaksi);?>" class='btn btn-info'><i class="icon-pencil5"></i></a>&nbsp;<a href="<?=base_url('entry/hariandata/delete/'.$data->id_transaksi);?>" class='btn btn-danger'><i class="icon-trash"></i></a></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
</div>
