<!-- simpan dengan nama agama.php -->
<?php
    if (defined("GELANG") == false) {
        // ini menandakan dia lompat pagar
        die("Anda tidak boleh membuka halaman ini secara langsung!");
    }

    // lakukan query ke database
    $sql = "select * from agama";

    $result = mysqli_query($conn, $sql);

    // cek kewenangan
    $akses_hapus = cek_akses("hapus_agama",$conn);
    $akses_insert = cek_akses("form_tambah_agama",$conn);
?>

<div class="row">

    <div class="col kotak">

        <h3>

            Agama
            <span class='float-right'>
                <a href="?page=form_tambah_agama" class="btn btn-primary">Tambah Baru</a>
            </span>

        </h3>

        <table class='table table-bordered'>
            <tr>
                <th>No.</th>
                <th>ID Agama</th>
                <th>Nama Agama</th>

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
                    echo "<td>" . $row['id_agama'] . "</td>";
                    echo "<td>" . $row['nm_agama'] . "</td>";
                    echo "<td>";
                    
                    $btn = [];
                    $btn[] = "<a href='?page=form_edit_agama&id=".$row['id_agama']."'>Edit</a>";
                    if($akses_hapus == true)
                    {
                        $btn[] = "<a href='?page=hapus_agama&id=".$row['id_agama']."'>Hapus</a>";
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