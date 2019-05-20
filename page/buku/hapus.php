<?php
	$kode = @$_GET['kode_buku'];

	$koneksi -> query("delete from buku where kode_buku='$kode' ") ;

?>
<script type="text/javascript">
	alert("Data Anda Telah dihapus");
	window.location.href="?page=buku"; 
</script>