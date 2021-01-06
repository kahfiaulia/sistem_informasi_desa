<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}
?>

<div class="row kotak">
    <div class="col">
        <form action="?page=simpan_agama" method="post">

        <div class="form-group">
            <label>Masukkan Nama Agama</label>
            <input type="text" class="form-control" name="nama_agama">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
    </div>
</div>