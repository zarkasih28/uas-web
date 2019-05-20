<?php

	$tgl_pinjam = date("Y-m-d");
	$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7,date("Y"));
	$batas = date("Y-m-d", $tujuh_hari);
    $tgl = date("d-m");
    $tgl_pecah = explode(".",$tgl);

?>
<div class="panel panel-default">
<div class="panel-heading ">
	 Tambah Data
</div>
<div class="panel-body">
								<div class="row">
                                <div class="col-md-12">
                                    <form  method="POST" onclick="return validasi(this)">

                                    	<div class="form-group">
                                    	<label>Kode Buku</label>
                                        <select class="form-control" name="buku">
                                            <?php

                                            	$sql = $koneksi -> query("select * from buku order by kode_buku");

                                            	while ($data=$sql->fetch_assoc()) {
                                            		echo "<option value='$data[kode_buku].$data[judul]'>$data[kode_buku].$data[judul]</option>";
                                            	}

                                            ?>
                                        </select>

                                        </select>
                                    	</div>

                                    	<div class="form-group">
                                    	<label>ID Anggota</label>
                                        <select class="form-control" name="anggota">
                                            <?php

                                            	$sql = $koneksi -> query("select * from anggota order by id_anggota");

                                            	while ($data=$sql->fetch_assoc()) {
                                            		echo "<option value='$data[id_anggota].$data[nama_anggota]'>$data[id_anggota].$data[nama_anggota]</option>";
                                            	}

                                            ?>
                                        </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Pinjam</label>
                                            <input class="form-control" name="tgl_pinjam" type="text" id="tgl" value="<?php echo $tgl_pinjam; ?>" readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label>Batas Pengembalian</label>
                                            <input class="form-control" name="batas" type="text" id="tgl" value="<?php echo $batas; ?>" readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Kembali</label>
                                            <input class="form-control" name="tgl_kembali" type="text" id="tgl" value="" readonly/>
                                        </div>



                                        <div class="form-group">
                                        <label>Status </label>
                                        <select class="form-control" name="status">
                                                    echo "<option>pinjam</option>";
                                        </select>
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
	
	if (isset($_POST['simpan'])) {

        $id = $_POST['id'];
		
		$tgl_pinjam = $_POST['tgl_pinjam'];
		$batas = $_POST['batas'];

		$buku = $_POST['buku'];
		$pecah_buku = explode(".", $buku);

		$kode_buku = $pecah_buku[0];
		$judul = $pecah_buku[1];

		$anggota = $_POST['anggota'];
		$pecah_anggota = explode(".", $anggota);

		$id_anggota = $pecah_anggota[0];
		$nama_anggota = $pecah_anggota[1];

        $tgl_kembali = $_POST[$tgl_kembali];

        $status = $_POST['status'];



		$sql = $koneksi -> query("select * from buku where kode_buku = '$kode_buku'");
		
		while ($data = $sql -> fetch_assoc()) {
			
            $sisa = $data['jml_buku'];

			if ($sisa == 0) {
				?>
					<script type="text/javascript">
						alert("Maaf STOK Buku Habis, Datang Kembali Nanti. Terimakasih");
						window.location.href="?page=transaksi&&aksi=tambah";
					</script>

				<?php
			}else{

                    $sql1 = $koneksi -> query("select * from buku where kode_buku = '$kode_buku'");
                    $data1 = $sql1 -> fetch_assoc();
                    $jml_buku=$data1['jml_buku']-1;
                    $sql1 = $koneksi -> query("update buku set jml_buku='$jml_buku' where kode_buku = '$kode_buku'");
                
                    $sql = $koneksi -> query("insert into transaksi set id_trans='$id', kode_buku='$kode_buku' ,judul='$judul', id_anggota='$id_anggota', nama_anggota = '$nama_anggota', tgl_pinjam='$tgl_pinjam', batas='$batas', tgl_kembali='$tgl_kembali' ,status='$status' ");

                ?>
                    <script type="text/javascript">
                        alert("Data telah Ditambahkan!");
                        window.location.href="?page=transaksi";
                    </script>

                <?php
			}
		}
	}

?>