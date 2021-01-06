<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

$id = $_GET['id'];

// lakukan query ke database
$sql = "select * from agama where id_agama=".$id;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="row kotak">
    <div class="col">
    <form action="?page=simpan_agama&id=<?php echo $row['id_agama'];?>" method="post">

        <div class="form-group">
            <label>Masukkan Nama Agama</label>
            <input type="text" class="form-control" name="nama_agama" value="<?php echo $row['nm_agama'];?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>