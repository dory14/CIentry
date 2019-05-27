<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i>Lihat <?=$title;?> Bulanan</h5>
  </div>
<div class="panel-body">
<div class="container">


	<input type='text' placeholder="klik Pilih Bulan" id='tanggal' name="tanggal" class="form-control" style="width:300px">
	<button type='button' id='cek' class='btn btn-info'>Hasil</button>
</div>
</div>
<div>
<div class="panel-body">
<div id="s"></div>
</div>

<style type="text/css">
#cek{float: right; margin-right: 500px}
#tanggal{float:left;margin-left: 320px}
#s{}
</style>
<script type="text/javascript">  
    $("#tanggal").datepicker({
        format: 'mm-yyyy',
        viewMode: "months",
        minViewMode: "months"
    });
    $('#cek').click(function(){
    	f = $('#tanggal').val();
    	$.ajax({
			url:"<?=base_url('entry/Laporan/cetak');?>",
			type:"post",
			data:"tanggal="+f,
			dataType:"Json",
			chace:false,
			success:function(pesan){
				$('#s').html(pesan);

			}
		});
    });
</script>