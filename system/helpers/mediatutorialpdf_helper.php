<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Fungsi ini untuk mengenerate pdf, diambil dari http://code.googel.com/p/dompdf
usage: http://code.google.com/p/dompdf/wiki/usage
$object = ini adalah html, atau object text lain yang akan kita jadikan pdf
$filename = nama file untuk pdf yang jadi (contoh hasil.pdf)
$direct_download = apakah akan didownload langsung?? true menampilkan dialog browser
*/
function generate_pdf($object, $filename='', $direct_download=TRUE){
	require_once("dompdf/dompdf_config.inc.php");
	$dompdf = new DOMPDF();
	$dompdf->load_html($object);
	$dompdf->render();

	if($direct_download == TRUE)
		$dompdf->stream($filename);
	else
		return $dompdf->output();

	//$file_to_save = '/asset/file.pdf';
	//file_put_contents($file_to_save, $dompdf->output()); 
}
?>