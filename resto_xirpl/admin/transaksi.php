<div class="judul">
    <div class="keterangan">Data Transaksi</div>
</div>
<div class="data">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
        <?php
          $no=1;
          $data = $dbo->select("orders a, pelanggan b where a.idpelanggan = b.idpelanggan","a.*, b.nama_pelanggan");
          foreach($data as $row){
            $datatotal = $dbo->select("orderdetail where idorder = ".$row['idorder']);
            $total = 0;
            foreach($datatotal as $rowtotal){
                $total += $rowtotal['jumlah'] * $rowtotal['harga'];
            }
            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['tglorder']?></td>
                <td><?=$row['nama_pelanggan']?></td>
                <td><?=$total?></td>
                <td>
                    <?php
                    if($row['total']==null){
                        echo "<a href='?hal=bayar&id=$row[idorder]'>Bayar</>";
                    }else{
                        echo "Lunas";
                    }
                    ?>
                </td>
            </tr>
            <?php
          }
        ?>
    </table>
</div>