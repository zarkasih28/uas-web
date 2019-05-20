<?php
	$koneksi = new mysqli("localhost","root","","perpustakaan");

	$id_a = @$_GET['id_anggota'];

	$sql = mysqli_query($koneksi,"select * from anggota where id_anggota='$id_a'");

	$tampil = mysqli_fetch_assoc($sql);

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
                                            <label>ID Anggota</label>
                                            <input class="form-control" name="id_anggota" type="text" value="<?php echo $tampil['id_anggota']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <input class="form-control" name="nama_anggota" type="text"value="<?php echo $tampil['nama_anggota']; ?>" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="radio" value="Laki-laki" name="jk_anggota"/> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" value="Perempuan" name="jk_anggota"/> Perempuan
                                            </label>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Prodi</label>
                                        <select class="form-control" name="prodi">
                                            <option value="Teknik Informatika" >Teknik Informatika</option>
                                            <option value="Teknik Mesin">Teknik Mesin</option>
                                            <option value="Teknik Elektro">Teknik Elektro</option>
                                            <option value="Manajemen">Manajemen</option>
                                            
                                        </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>NO Telp</label>
                                            <input class="form-control" name="no_telp" type="text" value="<?php echo $tampil['no_telp']; ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" name="alamat_anggota" type="text" value="<?php echo $tampil['alamat_anggota']; ?>" />
                                        </div>
                                        <div>
                                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary" />
                                        </div>

                                </div>
                                </form>
                                </div>

</div>
</div>
</div>
<?php
    $id_a   = @$_POST['id_anggota'];
    $nama   = @$_POST['nama_anggota'];
    $jk     = @$_POST['jk_anggota'];
    $prodi  = @$_POST['prodi'];
    $notel  = @$_POST['no_telp'];
    $alamat = @$_POST['alamat_anggota'];

	$simpan	= @$_POST['simpan'];

	if ($simpan) {
		$sql = $koneksi -> query("update anggota set id_anggota='$id_a' ,nama_anggota='$nama', jk_anggota='$jk', prodi='$prodi', no_telp='$notel', alamat_anggota='$alamat' where id_anggota='$id_a'");
		if ($sql) {
			?>
			<script type="text/javascript">
				alert ("Data Berhasil Diupdate!");
                window.location.href="?page=anggota";
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