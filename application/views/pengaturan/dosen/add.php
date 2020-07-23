<a href="<?=base_url('pengaturan/dosen')?>" class="btn btn-sm btn-secondary mb-2">kembali</a>

<div class="card card-body">
    <h5><b>Tambah data dosen</b></h5><br>
    <form action="<?=base_url('pengaturan/do_addDosen')?>" method="post">
        <div class="form-group">
            <label for="">NIP</label>
            <input type="number" name="nip" class="form-control col-4" required>
        </div>
        <div class="form-group">
            <label for="">NIDN</label>
            <input type="number" name="nidn" class="form-control col-4" required>
        </div>
        <div class="form-group">
            <label for="">Nama Dosen</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success float-right">Simpan</button>
    </form>
</div>