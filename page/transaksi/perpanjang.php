<?php
	include "transaksi.php";

	$sql = $koneksi -> query("select * from transaksi");  

	$id = $_GET['id_trans']; 
	$batas = $_GET['batas'];
	$lambat = $_GET['lambat'];
	$judul = $_GET['judul'];

	if($lambat <= 7){
		$pecah_tgl_kembali = explode(".", $batas);
		$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7,date("Y"));
		$hari_next = date("Y-m-d", $tujuh_hari);

		
			?>
		<script type="text/javascript">
			alert("Perpanjangan Berhasil");
			window.href.location="?page=transaksi&aksi=perpanjangan";
		</script>
			<?php
			$koneksi-> query("update transaksi set batas='$hari_next' where id_trans='$id'");
 
		
	}else{
		?>

	<script type="text/javascript">
		alert(" Buku tidak dapat diperpanjang karena telat lebih dari 7 hari");
		window.href.location="?page=transaksi";
	</script>
	
	<?php
	}
		
?>

