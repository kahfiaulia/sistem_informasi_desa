<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

$id = $_GET['id'];

// lakukan query ke database
$sql = "select * from warga where id_warga=".$id;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="row kotak">
    <div class="col">
    <form action="?page=simpan_warga&id=<?php echo $row['id_warga'];?>" method="post">

        <div class="form-group">
            <label>Masukkan Nama Warga</label>
            <input type="text" class="form-control" name="nm_warga" value="<?php echo $row['nm_warga'];?>">
            <label>Masukkan Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $row['tgl_lahir'];?>">
            <label>Masukkan Tempat Lahir</label>
            <input type="text" class="form-control" name="tmpt_lahir" value="<?php echo $row['tmpt_lahir'];?>">
            <label>Masukkan Jenis Kelamin</label>
            <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin'];?>">
            <label>Masukkan RT</label>
            <input type="text" class="form-control" name="rt" value="<?php echo $row['rt'];?>">
            <label>Masukkan RW</label>
            <input type="text" class="form-control" name="rw" value="<?php echo $row['rw'];?>">
            <label>Masukkan Dusun</label>
            <input type="text" class="form-control" name="dusun" value="<?php echo $row['dusun'];?>">
            <label>Masukkan Nama Jalan</label>
            <input type="text" class="form-control" name="nm_jalan" value="<?php echo $row['nm_jalan'];?>">
            <label>Masukkan Nomor Rumah</label>
            <input type="text" class="form-control" name="no_rumah" value="<?php echo $row['no_rumah'];?>">
            <label>Masukkan ID Kepala Keluarga</label>
            <input type="text" class="form-control" name="id_kepala_keluarga" value="<?php echo $row['id_kepala_keluarga'];?>">
            <label>Masukkan Nomor KK</label>
            <input type="text" class="form-control" name="no_kk" value="<?php echo $row['no_kk'];?>">
            <label>Masukkan ID Pekerjaan</label>
            <input type="text" class="form-control" name="id_pekerjaan" value="<?php echo $row['id_pekerjaan'];?>">
            <label>Masukkan Nomor HP</label>
            <input type="text" class="form-control" name="no_hp" value="<?php echo $row['no_hp'];?>">
            <label>Masukkan ID Agama</label>
            <input type="text" class="form-control" name="id_agama" value="<?php echo $row['id_agama'];?>">
            <label>Masukkan ID Status Kawin</label>
            <input type="text" class="form-control" name="id_status_kawin" value="<?php echo $row['id_status_kawin'];?>">
            <label>Masukkan Nomor KTP</label>
            <input type="text" class="form-control" name="no_ktp" value="<?php echo $row['no_ktp'];?>">
            <label>Masukkan Penghasilan</label>
            <input type="text" class="form-control" name="penghasilan" value="<?php echo $row['penghasilan'];?>">
            <label>Masukkan ID Jenjang Pendidikan</label>
            <input type="text" class="form-control" name="id_jenjang_pendidikan" value="<?php echo $row['id_jenjang_pendidikan'];?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>