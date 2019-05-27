<a href="<?=base_url('entry/user/add');?>" type="button" class="btn btn-primary btn-sm"><i class="icon-file-plus"></i> Tambah </a>
<p>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i> <?=$title;?></h5>
  </div>
<div class="panel-body">
 <table class="table table-bordered datatable-columns">
       <thead>
<tr>
	<th>NO</th>
	<th>User Name</th>
	<th>Password</th>
	<th></th>
	<th>Status</th>
	<th>Akses</th>
	<th>Action</th>
</tr>
</thead>
      <tbody>
<?php $no=0; foreach($users as $data): $no++;?>
	<tr>
	<td></td>
	<td><?=$data->username;?></td>
	<td><?=$data->password;?></td>
	<td><?=$no;?></td>
	<td><?=$data->status;?></td>
	<td><?=$data->akses;?></td>
	<td><a href="<?=base_url('entry/user/update/'.$data->id_user);?>" class='btn btn-info'><i class="icon-pencil5"></i></a>&nbsp;<a href="<?=base_url('entry/user/hapus/'.$data->id_user);?>" class='btn btn-danger'><i class="icon-trash"></i></a></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
</div>

