<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=OutputPenduduk.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
td {
   vertical-align: middle;
}
</style>
<div class='container'>
<h3 align='center'>Laporan Pendapatan Asli Daerah</h1>
<div align='center'>Laporan Bulan&nbsp;&nbsp;<?=$date;?>
</div>
<p>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
	<tr>
		<th rowspan='2'>NO</th>
		<th rowspan='2'>KODE REKENING</th>
		<th rowspan='2'>NAMA REKENING</th>
		<th rowspan='2'>TARGET (Rp)</th>
		<th colspan='3'>RELASI</th>
		<th rowspan='2'>%</th>
	</tr>
	<tr>
	<th>s/d Bulan Lalu</th>
	<th>Bulan Ini</th>
	<th>s/d Bulan Ini</th>
</tr>
<?php 
 $bulan_lalu = 0;
 $bulan_nini = 0;
 $sampai_bulan_ini = 0;
 $no=1;
 ?>
<?php foreach ($laporan1 as $row) :

/**cara jumlah array 2
$t_target +=$row->target;
<?=$t_target;?>**/
//sum target
$h_target[]=$row->target;
$target=array_sum($h_target);
//sum bulan_lalu
$h_bulan1[]=$row->bulan_lalu;
$bulan_lalu=array_sum($h_bulan1);
//sum bulan_ini
$h_bulan2[]=$row->bulan_ini;
$bulan_ini=array_sum($h_bulan2);
//sum sampai_bulan_lalu
$h_bulan3[]=$row->sampai_bulan_ini;
$sampai_bulan_ini=array_sum($h_bulan3);

	?>

<tr>

	<td><?=$no?></td>
	<td><?=$row->kd_rek;?></td>
	<td><?=$row->nm_rek;?></td>
	<td><?="Rp ".number_format($row->target, 0, ',', '.'); ?></td>
	<td><?= number_format($row->bulan_lalu, 0, ',', '.'); ?></td>
	<td><?= number_format($row->bulan_ini, 0, ',', '.'); ?></td>
	<td><?= number_format($row->sampai_bulan_ini, 0, ',', '.'); ?></td>
	<td><?=round((($row->sampai_bulan_ini/$row->target)*100),2);?></td>
<?php $no++;?>
<?php endforeach;?>
<tr>
	<th colspan='3'>TOTAL</td>
	<td><?= number_format($target, 0, ',', '.'); ?></td>
	<td><?= number_format($bulan_lalu, 0, ',', '.'); ?></td>
	<td><?= number_format($bulan_ini, 0, ',', '.'); ?></td>
	<td><?= number_format($sampai_bulan_ini, 0, ',', '.'); ?></td>
	<td><?=round((($sampai_bulan_ini/$target)*100),2);?></td>
</tr>
<tr>
</table>
</div>