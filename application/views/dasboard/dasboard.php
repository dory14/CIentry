
  <?php $data=$this->db->get('masterdata')->result(); ?>
		<div id='container'></div>
<script type="text/javascript" src="<?php echo base_url('assets/coba/js/highcharts.js"') ?>"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik '
         },
         xAxis: {
            categories: ['Nama PT']
         },
         yAxis: {
            title: {
               text: 'Target'
            }
         },
              series:             
            [
            <?php 
        foreach($data as $data){
            $merk = $data->nm_rek;
            $stok = $data->kd_rek;
                  
                  ?>
                  {
                      name: '<?php echo $merk; ?>',
                      data: [<?php echo $stok; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	

</script>
  		