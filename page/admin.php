<?php

    include "loginnih.php"; 
    $id_admin=$_SESSION['username'];
?>


<html>
<div class="row">
                <h3 align="center">Welcome To Liblary</h3>
                <div class="panel-body">
                    <form style="text-align: center;">
                <?php 
                
            $sql = $koneksi -> query("select * from admin where id_admin='$id_admin'");


                    while ($data=$sql->fetch_assoc()) {
               ?>
               <?php echo "Informasi  Data Diri Anda"; ?><br>
               ID anda : <?php echo $data['id_admin']; ?><br>     
               Nama    : <?php echo $data['nama_admin']; ?><br>
               Username: <?php echo $data['username']; ?><br>
                    <br>
                    <br>
                    <img src="assets/img/jadwal.png">
           <?php }                              
            ?>
            </form>
            </div>
            </div>
            </html>