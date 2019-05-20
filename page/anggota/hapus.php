<?php  
	$id_a= @$_GET['id_anggota'];

	$koneksi -> query("delete from anggota where id_anggota='id_a'") ;
?>

<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.href.location="?page=anggota";
</script>