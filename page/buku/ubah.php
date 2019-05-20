<?php
	$koneksi = new mysqli("localhost","root","","perpustakaan");

	$kode = @$_GET['kode_buku'];

	$sql = mysqli_query($koneksi,"select * from buku where kode_buku='$kode'");

	$tampil = mysqli_fetch_assoc($sql);

	$tahun = $tampil['tahun_terbit'];

?>


<div class="panel panel-default">
<div class="panel-heading">
	Ubah Data
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form  method="POST">
                                        <div class="form-group">
                                            <label>Kode Buku</label>
                                            <input class="form-control" name="kode" value="<?php echo $tampil['kode_buku']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" type="text" value="<?php echo $tampil['judul']; ?>" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control" name="pengarang" type="text" value="<?php echo $tampil['pengarang']; ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" type="text" value="<?php echo $tampil['penerbit']; ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select class="form-control" name="tahun"> 
                                            	<?php
                                            		$tahun = date("Y");

                                            		for ($i=$tahun-30; $i<=$tahun ; $i++) { 
                                         				if ($tahun==$i) {
                                         				echo'	<option value="'.$i.'" selected> '.$i.'</option>';
                                         				}else {

                                         				echo'	<option value="'.$i.'">'.$i.'</option>';
                                         				}
                                         				
                                            		}
                                            	?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control" name="jml" type="number" value="<?php echo $tampil['jml_buku']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Input</label>
                                            <input class="form-control" name="tgl" type="date" value="<?php echo $tampil['tgl_input']; ?>"/>
                                        </div>
                                        <div>
                                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" />
                                        </div>

                                </div>
                                </form>
                                </div>

</div>
</div>
</div>
<?php
	$kode 	= @$_POST['kode'];
	$judul 		= @$_POST['judul'];
	$pengarang 	= @$_POST['pengarang'];
	$penerbit 	= @$_POST['penerbit'];
	$tahun	= @$_POST['tahun'];
	$jml	= @$_POST['jml'];
	$tgl	= @$_POST['tgl'];

	$simpan	= @$_POST['simpan'];

	if ($simpan) {
		$sql = $koneksi -> query("update buku set kode_buku='$kode' ,judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', jml_buku='$jml', tgl_input='$tgl' where kode_buku='$kode'");
		if ($sql) {
			?>
			<script type="text/javascript">
				alert ("Data Berhasil Diupdate!");
                window.location.href="?page=buku";
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

?>