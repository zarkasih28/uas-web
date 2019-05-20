
	<?php  
	$id_a= @$_GET['id_trans'];

	$sql = $koneksi -> query("select * from transaksi where id_trans='$id_a'") ;

	$data = $sql->fetch_assoc();

	$tgl_balik = date("Y-m-d");

?>
<div class="panel panel-default">
<div class="panel-heading">
	Tambah Data
</div>
<div class="panel-body">


								<div class="row">
                                <div class="col-md-12">
                                    <form  method="POST" onclick="return validasi(this)">

                                        <div class="form-group">
                                            <label>Id Transaksi</label>
                                            <input class="form-control" name="id_trans" type="text" id="id_trans" value="<?php echo $data['id_trans'] ?>"  readonly/>
                                        </div>

										<div class="form-group">
                                            <label>Kode Buku</label>
                                            <input class="form-control" name="kode_buku" type="text" id="kode_buku" value="<?php echo $data['kode_buku'] ?>"  readonly/>
                                        </div>                                        

                                        <div class="form-group">
                                            <label>Id Anggota</label>
                                            <input class="form-control" name="id_anggota" type="text" id="id_anggota" value="<?php echo $data['id_anggota'] ?>"  readonly/>
                                        </div>  

                                    	<div class="form-group">
                                            <label>Tanggal Kembali</label>
                                            <input class="form-control" name="tgl_kembali" type="text" id="tgl_kembali" value="<?php echo $tgl_balik ?>"  readonly/>
                                        </div>
                                            <?php

                                                $denda = 2000;

                                                $tgl_kembali = $data['tgl_kembali'];
                                                $tanggal_dateline = date('Y-m-d');

                                                $batas1 = $data['batas'];

                                            if ($tgl_kembali=="0000-00-00") {
                                                    $lambat = terlambat($batas1,$tanggal_dateline);
                                            }else{
                                                $lambat = terlambat($batas1,$tgl_kembali);
                                                }

                                            $denda1 = $lambat*$denda;
                                            ?>

                                        <div class="form-group">
                                        <label>Denda</label>
                                        <input class="form-control" name="id" type="text" id="id" value="<?php echo "Rp. " .$denda1 ?>"  readonly/>
                                        </div>

                                       <div class="form-group">
                                        <label>Status </label>
                                        <select class="form-control" name="status" id="status">
                                                <option>kembali </option">
                                        </select>
                                        </div>

                                    	<div>
                                        <input type="submit" name="simpan" value="Kembalikan" class="btn btn-primary" />
                                        </div>

                                </div>
                                </form>
                                </div>

</div>
</div>
</div>

<?php

	if (isset($_POST['simpan'])) {
		$id_trans = $_POST['id_trans'];
		$tgl_kembali = $_POST['tgl_kembali'];
		$status = $_POST['status'];
		$kode_buku = $_POST['kode_buku'];

		$simpan	= @$_POST['simpan'];

	if ($simpan) {
		$sql2 = $koneksi -> query("update transaksi set tgl_kembali='$tgl_kembali' ,status='$status' where id_trans='$id_trans'");
		if ($sql2) {
			
			$sql = $koneksi -> query("select * from buku where kode_buku = '$kode_buku'");
			$data = $sql -> fetch_assoc();

			$jml_buku=$data['jml_buku']+1;
			$sql1 = $koneksi -> query("update buku set jml_buku='$jml_buku' where kode_buku = '$kode_buku'");
			?>

			<script type="text/javascript">
				alert ("Data Berhasil Diupdate!");
                window.location.href="?page=transaksi";
			</script>
			<?php

		}
		else {
			?>
			<script type="text/javascript">
				alert("GAGAL");
			</script>
			<?php
		}

	}
	}



?>