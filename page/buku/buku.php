<a href="?page=buku&aksi=tambah" class="btn btn-primary fa fa-plus-square-o" style="margin-bottom: 5px;"> Tambah Data</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Kode Buku</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Jumlah Buku</th>
                                            <th>Tanggal Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no = 1;
                                    		$sql = $koneksi->query("select * from buku");

                                    		while ($data=$sql->fetch_assoc()) {
                                    			
                                    	?>
                                    	<tr>
                                    		<td><?php echo $no++	?></td>
                                    		<td><?php echo $data['kode_buku'];	?></td>
                                    		<td><?php echo $data['judul'];	?></td>
                                    		<td><?php echo $data['pengarang'];	?></td>
                                    		<td><?php echo $data['penerbit'];	?></td>
                                    		<td><?php echo $data['tahun_terbit'];	?></td>
                                    		<td><?php echo $data['jml_buku'];	?></td>
                                    		<td><?php echo $data['tgl_input'];	?></td>
                                    		<td>
                                    			<a href="?page=buku&aksi=ubah&kode_buku=<?php echo $data['kode_buku'];?>"  class="btn btn-info fa fa-pencil-square"> Ubah</a>
                                    			<a onclick="return confirm('Anda akan mengahapus data ini?')" href="?page=buku&aksi=hapus&kode_buku=<?php echo $data['kode_buku']?>" class="btn btn-danger fa fa-times-circle"> Hapus</a>
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