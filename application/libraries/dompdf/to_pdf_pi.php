<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function pdf_create($html,$filename, $stream='potrait'){
	required_once("config.inc.php");
		$dompdf= new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper($papersize,$orientation);
		$dompdf->render();
		if($stream){
		$options=['Attachment']=1;
		$options=['Accept-Ranges']=0;
		$options=['compress']=1;
		$dompdf->stream($xfilename.".pdf".$options);
		}else{
		write_file("$xfilename.pdf",$dompdf->output());
		}
}