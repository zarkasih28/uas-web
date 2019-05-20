<div class="panel panel-default">
<div class="panel-heading">
	Tambah Data
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form  method="POST" onclick="return validasi(this)">
                                        <div class="form-group">
                                            <label>ID Anggota</label>
                                            <input class="form-control" name="id_anggota" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <input class="form-control" name="nama_anggota" type="text" />
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
                                            <label>Program Studi</label>
                                        <select class="form-control" name="prodi">
                                            <option value="Teknik Informatika" >Teknik Informatika</option>
                                            <option value="Teknik Mesin">Teknik Mesin</option>
                                            <option value="Teknik Elektro">Teknik Elektro</option>
                                            <option value="Manajemen">Manajemen</option>
                                            
                                        </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>NO Telp</label>
                                            <input class="form-control" name="no_telp" type="number" />
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" name="alamat_anggota" type="text" />
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
	$id_a 	= @$_POST['id_anggota'];
	$nama 	= @$_POST['nama_anggota'];
	$jk 	= @$_POST['jk_anggota'];
	$prodi 	= @$_POST['prodi'];
	$notel	= @$_POST['no_telp'];
	$alamat	= @$_POST['alamat_anggota'];

	$simpan	= @$_POST['simpan'];

	if ($simpan) {
		$sql = $koneksi -> query("insert into anggota set id_anggota='$id_a' ,nama_anggota='$nama', jk_anggota='$jk', prodi='$prodi', no_telp='$notel', alamat_anggota='$alamat'");
		if ($sql) {
			?>
			<script type="text/javascript">
				alert ("Data Berhasil Disimpan!");
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