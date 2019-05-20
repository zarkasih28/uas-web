<div class="panel panel-default">
<div class="panel-heading">
	Tambah Data
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form  method="POST">
                                        <div class="form-group">
                                            <label>Kode Buku</label>
                                            <input class="form-control" name="kode" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" type="text" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control" name="pengarang" type="text" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" type="text" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select class="form-control" name="tahun"> 
                                            	<?php
                                            		$tahun = date("Y");

                                            		for ($i=$tahun-30; $i<=$tahun ; $i++) { 
                                         				echo'

                                         					<option value="'.$i.'">'.$i.'</option>

                                         				';
                                            		}
                                            	?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control" name="jml" type="number" />
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Input</label>
                                            <input class="form-control" name="tgl" type="date" />
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
		$sql = $koneksi -> query("insert into buku set kode_buku='$kode' ,judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', jml_buku='$jml', tgl_input='$tgl'");
		if ($sql) {
			?>
			<script type="text/javascript">
				alert ("Data Berhasil Disimpan!");
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