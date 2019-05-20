<a href="?page=transaksi&aksi=tambah" class="btn btn-primary fa fa-plus-square-o" style="margin-bottom: 5px;"> Tambah Data</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                        	<th>Kode Buku</th>
                                        	<th>Judul</th>
                                            <th>Id Anggota</th>
                                            <th>Nama Angggota</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Batas Kembali</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Terlambat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no = 1;

                                    		$sql = $koneksi->query("select * from transaksi where status='pinjam'");

                                    		while ($data=$sql->fetch_assoc()) {
                                    			
                                    	?>
                                    	<tr>
                                            <td><?php echo $no++;   ?></td>
                                    		<td><?php echo $data['kode_buku'];    	?></td>
                                    		<td><?php echo $data['judul'];	   ?></td>
                                    		<td><?php echo $data['id_anggota'];	  ?></td>
                                    		<td><?php echo $data['nama_anggota'];	    ?></td>
                                    		<td><?php echo $data['tgl_pinjam'];	  ?></td>                                   	
                                    		<td><?php echo $data['batas'];	   ?></td>
                                    		<td><?php echo $data['tgl_kembali'];      ?></td>
                                    		<td>
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

                                    			if ($lambat>0) {
                                    				echo "
                                    					<font color='red'>$lambat Hari<br>(Rp $denda1)</font>


                                    				";
                                    			}else{
                                    				echo $lambat . " Hari";
                                    			}
                                    		?>
                                    		</td>

                                    		<td><?php echo $data['status'];	?></td>

                                    		<td>
                                    	       <a href="?page=transaksi&aksi=perpanjang&id_trans=<?php echo $data['id_trans'];?>&lambat=<?php echo $lambat?>&batas=<?php echo $data['batas']?>&judul=<?php echo $data['judul']?>"  class="btn btn-info "> Perpanjang</a>

                                                <a href="?page=transaksi&aksi=pengembalian&id_trans=<?php echo $data['id_trans']?>" class="btn btn-danger "> Kembalikan</a>
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