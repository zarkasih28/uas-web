<a href="?page=anggota&aksi=tambah" class="btn btn-primary fa fa-plus-square-o" style="margin-bottom: 5px;"> Tambah Data</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Id Anggota</th>
                                            <th>Nama Angggota</th>
                                            <th>Jenis kelamin</th>
                                            <th>Prodi</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no = 1;
                                    		$sql = $koneksi->query("select * from anggota");

                                    		while ($data=$sql->fetch_assoc()) {
                                    			
                                    	?>
                                    	<tr>
                                    		<td><?php echo $no++	?></td>
                                    		<td><?php echo $data['id_anggota'];	?></td>
                                    		<td><?php echo $data['nama_anggota'];	?></td>
                                    		<td><?php echo $data['jk_anggota'];	?></td>
                                    		<td><?php echo $data['prodi'];	?></td>
                                    		<td><?php echo $data['no_telp'];	?></td>
                                    		<td><?php echo $data['alamat_anggota'];	?></td>
                                    		<td>
                                    			<a href="?page=anggota&aksi=ubah&id_anggota=<?php echo $data['id_anggota'];?>"  class="btn btn-info fa fa-pencil-square"> Ubah</a>
                                    			<a onclick="return confirm('Anda akan mengahapus data ini?')" href="?page=anggota&aksi=hapus&id_anggota=<?php echo $data['id_anggota']?>" class="btn btn-danger fa fa-times-circle"> Hapus</a>
                                    		</td>
                                    	</tr>	

                                    <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>