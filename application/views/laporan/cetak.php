<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i> <?=$title;?> Bulanan</h5>
  </div>
<div class="panel-body">
<div class='container'>
	<?= form_open('entry/laporan/print');?>
	<?="PILIH BULAN :";?>
	<?="<p></p>"?>
	<input type='text' required placeholder="Pilih Bulan" id='tanggal' name="tanggal" class="form-control" style="width:400px">
	<?="<br>"?>
	<button type="submit" class="btn btn-md btn-success"><i class="icon-download"></i> Ekspor Ke Excel</button>
	<?=form_close();?>
</div>
</div>
</div>
<style type="text/css">
.panel-body{width:500px;height:300px;margin-left: 200px;}
.panel{width:900px;margin-left: 100px;}
</style>
<script type="text/javascript">  
    $("#tanggal").datepicker({
        format: 'mm-yyyy',
        viewMode: "months",
        minViewMode: "months"
    });
</script>