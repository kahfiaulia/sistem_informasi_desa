<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}
?>

<div class="row kotak">
    <div class="col">
        <form action="?page=simpan_warga" method="post">

            <div class="form-group">
                <label>Masukkan Nama Warga</label>
                <input type="text" class="form-control" name="nm_warga">
                <label>Masukkan Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir">
                <label>Masukkan Tempat Lahir</label>
                <input type="text" class="form-control" name="tmpt_lahir">
                <label>Masukkan Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin">
                <label>Masukkan RT</label>
                <input type="text" class="form-control" name="rt">
                <label>Masukkan RW</label>
                <input type="text" class="form-control" name="rw">
                <label>Masukkan Dusun</label>
                <input type="text" class="form-control" name="dusun">
                <label>Masukkan Nama Jalan</label>
                <input type="text" class="form-control" name="nm_jalan">
                <label>Masukkan Nomor Rumah</label>
                <input type="text" class="form-control" name="no_rumah">
                <label>Masukkan ID Kepala Keluarga</label>
                <input type="text" class="form-control" name="id_kepala_keluarga">
                <label>Masukkan Nomor KK</label>
                <input type="text" class="form-control" name="no_kk">
                <label>Masukkan ID Pekerjaan</label>
                <input type="text" class="form-control" name="id_pekerjaan">
                <label>Masukkan Nomor HP</label>
                <input type="text" class="form-control" name="no_hp">
                <label>Masukkan ID Agama</label>
                <input type="text" class="form-control" name="id_agama">
                <label>Masukkan ID Status Kawin</label>
                <input type="text" class="form-control" name="id_status_kawin">
                <label>Masukkan Nomor KTP</label>
                <input type="text" class="form-control" name="no_ktp">
                <label>Masukkan Penghasilan</label>
                <input type="text" class="form-control" name="penghasilan">
                <label>Masukkan ID Jenjang Pendidikan</label>
                <input type="text" class="form-control" name="id_jenjang_pendidikan">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
    </div>
</div>