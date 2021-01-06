<!-- simpan dengan nama agama.php -->
<?php
    if (defined("GELANG") == false) {
        // ini menandakan dia lompat pagar
        die("Anda tidak boleh membuka halaman ini secara langsung!");
    }

    // lakukan query ke database
    $sql = "select *, TIMESTAMPDIFF(YEAR, warga.`tgl_lahir`, NOW()) as usia from warga";

    $result = mysqli_query($conn, $sql);

    // cek kewenangan
    $akses_hapus = cek_akses("hapus_warga",$conn);
    $akses_insert = cek_akses("form_tambah_warga",$conn);
?>

<div class="row">

    <div class="col kotak">

        <h3>

            Warga
            <span class='float-right'>
                <a href="?page=form_tambah_warga" class="btn btn-primary">Tambah Baru</a>
            </span>

        </h3>

        <table class='table table-bordered table-responsive'>
            <tr>
                <th>No.</th>
                <th>ID Warga</th>
                <th>Nama Warga</th>
                <th>Tempat Tanggal lahir</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>ID Kepala Keluarga</th>
                <th>No. KK</th>
                <th>Pekerjaan</th>
                <th>No. HP</th>
                <th>Agama</th>
                <th>Status Kawin</th>
                <th>No. KTP</th>
                <th>Penghasilan</th>
                <th>Jenjang Pendidikan</th>
                <th>Action</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                $no = 0;
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $no++;
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['id_warga'] . "</td>";
                    echo "<td>" . $row['nm_warga'] . "</td>";
                    echo "<td>" . $row['tmpt_lahir'] .', '. $row['tgl_lahir']. "</td>";
                    echo "<td>" . $row['usia'] . "</td>";
                    echo "<td>" . $row['jenis_kelamin'] . "</td>";
                    echo "<td>" . $row['nm_jalan'] .' No. '. $row['no_rumah']. " RT ". $row['rt']. " RW ". $row['rw']. " Dusun ". $row['dusun']. "</td>";
                    echo "<td>" . $row['id_kepala_keluarga'] . "</td>";
                    echo "<td>" . $row['no_kk'] . "</td>";
                    echo "<td>" . $row['id_pekerjaan'] . "</td>";
                    echo "<td>" . $row['no_hp'] . "</td>";
                    echo "<td>" . $row['id_agama'] . "</td>";
                    echo "<td>" . $row['id_status_kawin'] . "</td>";
                    echo "<td>" . $row['no_ktp'] . "</td>";
                    echo "<td>" . $row['penghasilan'] . "</td>";
                    echo "<td>" . $row['id_jenjang_pendidikan'] . "</td>";
                    echo "<td>";
                    
                    $btn = [];
                    $btn[] = "<a href='?page=form_edit_warga&id=".$row['id_warga']."'>Edit</a>";
                    if($akses_hapus == true)
                    {
                        $btn[] = "<a href='?page=hapus_warga&id=".$row['id_warga']."'>Hapus</a>";
                    }
                    
                    echo implode(" | ",$btn);
                        
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

    </div>

</div>